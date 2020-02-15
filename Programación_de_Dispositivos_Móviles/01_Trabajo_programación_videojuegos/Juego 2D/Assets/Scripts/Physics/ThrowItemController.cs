using System.Collections;
using System.Collections.Generic;
using UnityEngine;

/// <summary>
/// Controla la destrucción de los elementos que causan daño
/// </summary>
public class ThrowItemController : MonoBehaviour
{
    //Cuando alcanza a un enemigo
    private void OnTriggerEnter2D(Collider2D collision)
    {
        switch (collision.gameObject.tag)
        {
            case "Enemy":
            case "DeadEnemy":
                Destroy(gameObject);
                break;
        }
    }

    //Cuando alcanza al jugador
    private void OnCollisionEnter2D(Collision2D collision)
    {
        switch (collision.gameObject.tag)
        {
            case "Player":
                Destroy(gameObject);
                break;
        }
    }

    //Cuando desaparece de la pantalla
    void OnBecameInvisible()
    {
        Destroy(gameObject);
    }
}
