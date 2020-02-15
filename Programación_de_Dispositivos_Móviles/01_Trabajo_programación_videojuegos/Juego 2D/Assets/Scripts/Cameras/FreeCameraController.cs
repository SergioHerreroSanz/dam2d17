using System.Collections;
using System.Collections.Generic;
using UnityEngine;

/// <summary>
/// Mueve la cámara a la posición del Player.
/// </summary>
public class FreeCameraController : MonoBehaviour
{
    [SerializeField] private float smoothTime = 0.1f;

    private Transform ObjectToFollow;
    private Vector2 velocity;

    private void Start()
    {
        //Obtener el Player
        ObjectToFollow = (Transform)GameObject.Find("Player").GetComponent("Transform");
    }

    void FixedUpdate()
    {
        //Coger la posición del elemento a seguir (ObjectToFollow) y mover la cámara a su posición tras un suavizado (con Math.SmoothDamp)
        float posX = Mathf.SmoothDamp(transform.position.x, ObjectToFollow.position.x, ref velocity.x, smoothTime);
        float posY = Mathf.SmoothDamp(transform.position.y, ObjectToFollow.position.y, ref velocity.y, smoothTime);

        //Mover a la posición
        transform.position = new Vector3(posX, posY, transform.position.z);
    }
}
