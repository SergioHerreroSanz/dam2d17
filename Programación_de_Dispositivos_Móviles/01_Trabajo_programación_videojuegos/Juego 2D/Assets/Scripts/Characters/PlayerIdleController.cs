using System.Collections;
using System.Collections.Generic;
using UnityEngine;

/// <summary>
/// Establece los parámetros para que se ejecute la animación de espera
/// </summary>
public class PlayerIdleController : MonoBehaviour
{
    private Animator anim;

    void Start()
    {
        //Obtiene el Animator
        anim = GetComponent<Animator>();

        //Establece los parámetros
        anim.SetFloat("velocity", 0);
        anim.SetBool("grounded", true);
        anim.SetBool("attack", false);
        anim.SetBool("alive", true);
    }
}
