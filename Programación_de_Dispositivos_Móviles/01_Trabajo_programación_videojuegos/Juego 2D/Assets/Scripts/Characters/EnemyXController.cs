using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class EnemyXController : MonoBehaviour
{
    [SerializeField] private float speed = 1f;
    [SerializeField] private Vector2 minPos;
    [SerializeField] private Vector2 maxPos;
    [SerializeField] private float deadTime = 5f;

    private Rigidbody2D rb2d;
    private Animator anim;

    private bool isAlive = true;

    void Start()
    {
        //Obtener los componentes
        rb2d = GetComponent<Rigidbody2D>();
        anim = GetComponent<Animator>();
    }

    void Update()
    {
        //Actualizar los parámetros para las animaciones
        anim.SetBool("moving", speed != 0);
        anim.SetBool("alive", isAlive);
    }

    void FixedUpdate()
    {
        if (isAlive)
        {
            //Si alcanza el límite cambiar la dirección del movimiento
            if ((minPos.x >= transform.position.x) || (maxPos.x <= transform.position.x)) { speed = -speed; }

            //Cambiar la orientación del sprite según la dirección del movimiento
            if (speed < 0)
            {
                transform.localScale = new Vector3(1f, 1f, 1f);
                rb2d.velocity = new Vector2(speed, rb2d.velocity.y);
            }
            else if (speed > 0)
            {
                transform.localScale = new Vector3(-1f, 1f, 1f);
                rb2d.velocity = new Vector2(speed, rb2d.velocity.y);
            }
        }
    }

    private void OnTriggerEnter2D(Collider2D col)
    {
        switch (col.gameObject.tag)
        {
            //Detectar la colisión con elementos de ataque y matar al enemigo si no o está ya
            case "DamageItem":
                if (isAlive) { StartCoroutine(Resurrect(deadTime)); }
                break;
        }
    }

    IEnumerator Resurrect(float time)
    {
        //Marcar el enemigo como muerto
        isAlive = false;
        //Congelar la posición para no ser empujado
        rb2d.constraints = RigidbodyConstraints2D.FreezeAll;
        //Cambiar la etiqueta para evitar que el personaje se haga daño al colisionar con el mientras esta muerto
        transform.gameObject.tag = "DeadEnemy";
        //Esperar
        yield return new WaitForSeconds(time);
        //Descongelar el movimiento
        rb2d.constraints = RigidbodyConstraints2D.FreezeRotation;
        rb2d.constraints = RigidbodyConstraints2D.FreezePositionY;
        //Restablecer la etiqueta
        transform.gameObject.tag = "Enemy";
        //Marcar como vivo y retomar la ejecución normal
        isAlive = true;
    }
}
