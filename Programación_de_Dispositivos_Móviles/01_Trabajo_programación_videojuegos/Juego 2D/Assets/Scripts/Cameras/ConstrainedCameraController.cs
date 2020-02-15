using System.Collections;
using System.Collections.Generic;
using UnityEngine;

/// <summary>
/// Mueve la cámara a la posición del Player si este está contenido en un espacio definido.
/// </summary>
public class ConstrainedCameraController : MonoBehaviour
{
    [SerializeField] private Vector2 minPosition;
    [SerializeField] private Vector2 maxPosition;
    [SerializeField] private float smoothTime;

    private Transform ObjectToFollow;
    private Vector2 velocity;

    private void Start()
    {
        //Obtener el Player
        ObjectToFollow = (Transform)GameObject.Find("Player").GetComponent("Transform");
    }

    void FixedUpdate()
    {
        //Coger la posición del Player (ObjectToFollow) y mover la cámara a su posición tras un suavizado (con Math.SmoothDamp)
        float posX = Mathf.SmoothDamp(transform.position.x, ObjectToFollow.position.x, ref velocity.x, smoothTime);
        float posY = Mathf.SmoothDamp(transform.position.y, ObjectToFollow.position.y, ref velocity.y, smoothTime);

        //Establecer al límite la cámara si sobrepasa el espacio definido
        posX = Mathf.Clamp(posX, minPosition.x, maxPosition.x);
        posY = Mathf.Clamp(posY, minPosition.y, maxPosition.y);

        //Mover a la posición
        transform.position = new Vector3(posX, posY, transform.position.z);
    }
}
