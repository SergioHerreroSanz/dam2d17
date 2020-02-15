using System.Collections;
using System.Collections.Generic;
using UnityEngine;

/// <summary>
/// Desbloquea la puerta de NextLevelController cuando detecta una colisión con el Player
/// </summary>
public class PressButonEventController : MonoBehaviour
{
    private NextLevelController parent;
    private GameObject released;
    private GameObject pressed;

    void Start()
    {
        //Obtener el script del padre y los objetos
        parent = (NextLevelController)GameObject.Find("NextLevelButtonDoor").GetComponent("NextLevelController");
        released = GameObject.Find("Released");
        pressed = GameObject.Find("Pressed");
        //Muestra el sprite del botón sin presionar y oculta el presionado
        released.SetActive(true);
        pressed.SetActive(false);
    }

    private void OnTriggerEnter2D(Collider2D collision)
    {
        //Muestra el sprite del botón presionado y oculta el sin presionar
        released.SetActive(false);
        pressed.SetActive(true);
        //Desbloquea la puerta
        parent.UnlockDoor();
    }
}
