using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

/// <summary>
/// Permite a los botones del menú de pausa reaizar acciones
/// </summary>
public class RunningMenuController : MonoBehaviour
{
    private GameObject pauseMenu;
    private float lives;
    private bool show;

    private void Start()
    {
        //Obtener pauseMenu y ocultarlo
        pauseMenu = GameObject.Find("PauseMenu");
        pauseMenu.SetActive(false);
    }

    void Update()
    {
        //Pausa o continúa la escena al pulsar Escape
        if (Input.GetKeyDown(KeyCode.Escape))
        {
            show = !show;
            if (show == false) { Pause(); } else { Resume(); }
        }
    }

    private void OnDestroy()
    {
        //Continúa la escena cuando se destruye el menú
        Time.timeScale = 1;
    }

    public void onRestartClick()
    {
        //Obtiene el Player
        GameObject player = GameObject.Find("Player");
        PlayerController playerController = (PlayerController)player.GetComponent("PlayerController");

        //Resetea al Player y la puntuación
        player.transform.position = new Vector3(-6, -3, 0);
        playerController.lives = 3;

        //Reinicia la escena
        SceneManager.LoadScene(SceneManager.GetActiveScene().buildIndex);
        Resume();

        Debug.Log("Restart!");
    }

    public void onReturnMenuClick()
    {
        //Lanza la escena Menú
        SceneManager.LoadScene("Menu");
        Resume();

        Debug.Log("ReturnMenu!");
    }

    public void onQuitClick()
    {
        //Cierra el videojuego
        Application.Quit();

        Debug.Log("Quit!");
    }

    public void onSoundToggle()
    {
        //Enciende o apaga el sonido
        AudioListener.volume = 1 - AudioListener.volume;
    }

    public void Pause()
    {
        //Para la escena, activa el menú de pausa y muestra el cursor
        pauseMenu.SetActive(true);
        Cursor.visible = true;
        Time.timeScale = 0;
    }

    public void Resume()
    {
        //Continúa la escena, desactiiva el menú de pausa y oculta el cursor
        Time.timeScale = 1;
        pauseMenu.SetActive(false);
        Cursor.visible = false;
    }
}
