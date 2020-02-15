using System;
using System.Collections;
using System.Collections.Generic;
using System.Runtime.CompilerServices;
using UnityEngine;
using UnityEngine.SceneManagement;

/// <summary>
/// Controlador de movimientos, y vida del personaje
/// </summary>
public class PlayerController : MonoBehaviour
{
    public int lives = 3;
    [SerializeField] private Vector3 spawn;
    [SerializeField] private float maxSpeed = 2f;
    [SerializeField] private float speed = 100f;
    [SerializeField] private float jumpPower = 7f;
    [SerializeField] private float inmuneTime = 5f;
    [SerializeField] private int jumpNumber = 2;
    [SerializeField] private GameObject weapon;

    private Rigidbody2D rb2d;
    private Animator anim;
    private SpriteRenderer spr;
    private Collider2D coll;

    private bool inmune = false;
    private bool grounded = false;
    private bool attack = false;
    private int jumps = 0;

    private bool unlocked = true;

    void Start()
    {
        //Añade el método ResetPosition para que se ejecute al cambiar de escena
        SceneManager.activeSceneChanged += ResetPosition;

        //Obtiene los componentes
        rb2d = GetComponent<Rigidbody2D>();
        anim = GetComponent<Animator>();
        spr = GetComponent<SpriteRenderer>();
        coll = GetComponent<CapsuleCollider2D>();
    }

    void Update()
    {
        //Establece los parámetros necesarios para cambiar la animación
        anim.SetFloat("velocity", Mathf.Abs(rb2d.velocity.x));
        anim.SetBool("grounded", grounded);
        anim.SetBool("attack", attack);
        anim.SetBool("alive", lives >= 1);

        //Comprueba la tecla espacio para atacar
        if (Input.GetKeyDown(KeyCode.Space)) { Attack(); }
    }

    void FixedUpdate()
    {
        //Comprueba el eje horizontal y mueve el personaje en el eje horizontal
        float ejeX = Input.GetAxis("Horizontal");
        Vector3 fixedVelocity = new Vector3(rb2d.velocity.x * 0.75f, rb2d.velocity.y);

        if (grounded) { rb2d.velocity = fixedVelocity; }
        rb2d.AddForce(Vector2.right * speed * ejeX);
        float speedLimit = Mathf.Clamp(rb2d.velocity.x, -maxSpeed, maxSpeed);
        rb2d.velocity = new Vector2(speedLimit, rb2d.velocity.y);

        //Según el valor del eje, gira el personaje
        if (ejeX > 0) { transform.localScale = new Vector3(Math.Abs(transform.localScale.x), transform.localScale.y, transform.localScale.z); }
        if (ejeX < 0) { transform.localScale = new Vector3(Math.Abs(transform.localScale.x) * -1f, transform.localScale.y, transform.localScale.z); }

        //Lee el eje vertical y salta
        if (Input.GetAxis("Vertical") > 0) { StartCoroutine(Jump()); }
    }

    void OnTriggerEnter2D(Collider2D collision)
    {
        switch (collision.gameObject.tag)
        {
            case "Enemy":
                //Detecta daño e inicia la corutina Harm()
                if (!inmune) { StartCoroutine(Harm(inmuneTime)); }
                break;
        }
    }

    void OnCollisionEnter2D(Collision2D collision)
    {
        switch (collision.gameObject.tag)
        {
            case "Platform":
                //Para el personaje y modifica parámetros para la animación
                rb2d.velocity = new Vector3(0f, 0f, 0f);
                transform.parent = collision.transform;
                grounded = true;
                break;
            case "jumpPlatform":
            case "Ground":
            case "ToggleElement":
                //Reestablece los saltos disponibles y modifica parámetros para la animación
                jumps = jumpNumber;
                grounded = true;
                break;
            case "DamageItem":
            case "DeadEnemy":
            case "Enemy":
                //Desactiva las colisines con el enemigo que ha causado daño
                Physics2D.IgnoreCollision(collision.collider, coll, true);
                break;

        }
    }

    void OnCollisionStay2D(Collision2D collision)
    {
        switch (collision.gameObject.tag)
        {
            case "Platform":
                transform.parent = collision.transform;
                grounded = true;
                break;
            case "jumpPlatform":
            case "Ground":
                grounded = true;
                break;
        }
    }

    void OnCollisionExit2D(Collision2D collision)
    {
        switch (collision.gameObject.tag)
        {
            case "Platform":
                transform.parent = null;
                break;
            case "JumpPlatform":
            case "Ground":
            case "ToggleElement":
                //Establece los saltos a l máximo menos 1 y modifica parámetros para la animación
                grounded = false;
                jumps = jumpNumber - 1;
                break;
        }
    }

    public void ResetPosition(Scene current, Scene next)
    {
        //Mueve el ersonaje a (-6, -3, 0)
        gameObject.transform.position = new Vector3(-6, -3, 0);
    }

    void OnBecameInvisible()
    {
        //Recarga la escena
        SceneManager.LoadScene(SceneManager.GetActiveScene().buildIndex);
    }

    IEnumerator Jump()
    {
        if (jumps > 0)
        {
            //Si hay saltos añade una fuerza vertical y espera hasta que se suelte la tecla de saltar.
            rb2d.velocity = new Vector2(rb2d.velocity.x, 0);
            rb2d.AddForce(Vector2.up * jumpPower, ForceMode2D.Impulse);
            int i = jumps--;
            Debug.Log("Jumps: " + jumps);
            yield return new WaitUntil(() => Input.GetAxis("Vertical") == 0);
            jumps = i;
        }
    }

    private void Attack()
    {
        //Instancia la roca y obtiene sus componentes
        var newWeapon = Instantiate(weapon);
        Rigidbody2D weaponRb2d = newWeapon.GetComponent<Rigidbody2D>();
        SpriteRenderer weaponSpr = newWeapon.GetComponent<SpriteRenderer>();

        //Desplaza la roca y establece la velocidad de movimiento
        weaponSpr.enabled = false;
        weaponRb2d.position = new Vector2(rb2d.position.x + (0.5f * transform.localScale.x), rb2d.position.y + 0.75f);
        weaponRb2d.velocity = new Vector2(transform.localScale.x * 7.5f, 1f);
        weaponSpr.enabled = true;

        //Destruye la roca a los 10 segundos
        Destroy(newWeapon, 10);
    }

    IEnumerator Harm(float tiempo)
    {
        //Reduce una vida del personaje, hace semitransparente al persinaje y si no quedanvidas para el juego
        lives--;
        if (lives < 1) { Time.timeScale = 0; }
        inmune = true;
        spr.color = new Color(spr.color.r, spr.color.g, spr.color.b, 0.5f);
        yield return new WaitForSeconds(tiempo);
        inmune = false;
        spr.color = new Color(spr.color.r, spr.color.g, spr.color.b, 1f);
    }

    /*
    public IEnumerator StartBlink()
    {
        while (blink)
        {
            spr.color = new Color(spr.color.r, spr.color.g, spr.color.b, 0f);
            yield return new WaitForSeconds(.1f);
            spr.color = new Color(spr.color.r, spr.color.g, spr.color.b, 1f);
            yield return new WaitForSeconds(.5f);
        }
    }
    */
}
