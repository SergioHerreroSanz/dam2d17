using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

/// <summary>
/// Controlador del menú principal
/// </summary>
public class MainMenuController : MonoBehaviour
{
    void Start()
    {
        //Activa el cursor al crearse
        Cursor.visible = true;
    }

    public void onPlayClick()
    {
        //Desactiva el cursor y cambia la escena
        Cursor.visible = false;
        SceneManager.LoadScene("Level00");

        Debug.Log("Play!");
    }

    public void onRunnerClick()
    {
        //Iniciará el Runner cuando se implemente
        //SceneManager.LoadScene("Runner");
        Debug.Log("Runner!");
    }

    public void onQuitClick()
    {
        //Cierra el videojuego
        Application.Quit();

        Debug.Log("Quit!");
    }
}
