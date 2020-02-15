using System.Collections;
using System.Collections.Generic;
using UnityEngine;

/// <summary>
/// Mueve eternamente un elemento de derecha a izquierda reseteando su posición al alcanzar un trigger
/// </summary>
public class InfiniteMovementItem : MonoBehaviour
{
    [SerializeField] private float speed;
    [SerializeField] private Transform neighbour;

    public void FixedUpdate()
    {
        //Desplaza de izquierda a derecha
        transform.Translate(Vector2.left * speed * Time.smoothDeltaTime);
    }

    public void SnapToNeighbour()
    {
        //Mueve el objeto a la derecaha de otro elemento igual
        transform.position = new Vector2(neighbour.position.x, transform.position.y);
    }

    private void OnTriggerEnter2D(Collider2D collision)
    {
        Debug.Log("Cloud trigger!");

        //Mueve el objeto a la derecaha de otro elemento igual cuando detecta el trigger
        if (collision.tag == "BackgroundReset")
        {
            SnapToNeighbour();
        }
    }
}
