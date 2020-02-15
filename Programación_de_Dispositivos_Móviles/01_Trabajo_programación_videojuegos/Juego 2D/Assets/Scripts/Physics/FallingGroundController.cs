using System.Collections;
using System.Collections.Generic;
using UnityEngine;

/// <summary>
/// Activa la gravedad de un bloque cuando detecta una colisión con el jugador y se elimina en la siguiente colisión.
/// </summary>
public class FallingGroundController : MonoBehaviour
{
    [SerializeField] private FallingCascadeController fallingCascadeController;
    public float fallTime = 2f;

    private int id;
    private Rigidbody2D rb2d;
    private bool firstCollision = true;

    //Guarda su posición (para FallingCascadeController)
    public void setId(int id) { this.id = id; }

    private void Start()
    {
        //Obtiene el componente Rigidbody2D
        rb2d = GetComponent<Rigidbody2D>();
    }

    private void OnCollisionEnter2D(Collision2D collision)
    {
        Debug.Log("Platform Fall!");

        //Si se detecta colisión con un jugador comienza a caer
        if (collision.gameObject.tag == "Player")
        {
            StartCoroutine(Fall(fallTime));
        }

        //Si detecta una colisión y no es la primera con un jugador se elimina
        if (!firstCollision)
        {
            Debug.Log("Platform Fall deleted!");
            Destroy(gameObject);
        }

    }

    //Método para activar la caída desde otro script
    public void ForceFall(float time) { StartCoroutine(Fall(time)); }

    IEnumerator Fall(float time)
    {
        //Esperar X segundos
        yield return new WaitForSeconds(time);
        //Comenzar a caer
        rb2d.constraints = RigidbodyConstraints2D.FreezeRotation;
        firstCollision = false;
        //Fuerza la caida de los bloques colindantes (solo si existe FallingCascadeController)
        try { fallingCascadeController.WarnNeighbour(id); } catch (System.Exception) { }
    }
}
