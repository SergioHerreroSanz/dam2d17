using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

/// <summary>
/// Cambia la escena al detectar Flecha Arriba o W mientras el Player esta en contacto con la puerta
/// </summary>
public class NextLevelToggle : MonoBehaviour
{
    private void OnTriggerStay2D(Collider2D collision)
    {
        Debug.Log("NextLevel!");
        if ((Input.GetKeyDown(KeyCode.UpArrow) | Input.GetKeyDown(KeyCode.W)) & collision.gameObject.tag == "Player")
        {
            //Lanza la siguiente escena
            SceneManager.LoadScene(SceneManager.GetActiveScene().buildIndex+1);
        }
    }
}
