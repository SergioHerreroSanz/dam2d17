using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class GameManager : MonoBehaviour
{
    private GameObject playerObject;
    private GameObject audioObject;
    private GameObject canvasObject;

    // Start is called before the first frame update
    void Start()
    {
        //Obtener los elementos
        playerObject = GameObject.Find("Player");
        audioObject = GameObject.Find("Audio");
        canvasObject = GameObject.Find("RunningMenu");

        //Evitar la destrucción de los elementos al cambiar de escena
        DontDestroyOnLoad(this.gameObject);
        DontDestroyOnLoad(playerObject);
        DontDestroyOnLoad(audioObject);
        DontDestroyOnLoad(canvasObject);

        //Añadir excepciones y cambiar de escena
        SceneManager.activeSceneChanged += Excepciones;
        SceneManager.LoadScene("Level01");
    }

    public void Excepciones(Scene current, Scene next)
    {
        //Borrar los objetos si se vuelve al menú
        if (next.buildIndex == SceneManager.GetSceneByName("Menu").buildIndex)
        {
            Destroy(playerObject);
            Destroy(audioObject);
            Destroy(canvasObject);
            Destroy(this.gameObject);
        }

    }
}
