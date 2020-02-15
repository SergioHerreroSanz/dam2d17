using System.Collections;
using System.Collections.Generic;
using TMPro;
using UnityEngine;

/// <summary>
/// Muestra la pantalla de final de videojuego y elimina los objetos heredados no deseados
/// </summary>
public class GameOverController : MonoBehaviour
{
    private GameObject scoreObject;
    private GameObject livesObject;
    private ScoreController scoreController;
    private TextMeshProUGUI text;

    void Start()
    {
        //Activa el cursor
        Cursor.visible = true;
        
        //Obtiene los componentes necesarios (vidas y puntuación del Player y texto donde se muestra)
        text = GetComponent<TextMeshProUGUI>();
        livesObject = GameObject.Find("Lives");
        scoreObject = GameObject.Find("Score");
        scoreController = (ScoreController)scoreObject.GetComponent("ScoreController");

        //Cambia el valor de la puntuación
        text.text = "Tiempo total: " + scoreController.score;

        //Borra los elementos mostrados en pantalla heredados por DontDestroyOnLoad() de la escena anterior
        Destroy(scoreObject);
        Destroy(livesObject);
    }
}