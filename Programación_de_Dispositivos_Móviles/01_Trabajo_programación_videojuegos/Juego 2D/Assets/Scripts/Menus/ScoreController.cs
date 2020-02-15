using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using TMPro;
using UnityEngine.SceneManagement;

/// <summary>
/// Controla la puntuación del jugador actual y la muestra por pantalla
/// </summary>
public class ScoreController : MonoBehaviour
{
    public int time = 0;
    public int score = 0;
    private TextMeshProUGUI timeText;

    void Start()
    {
        //Ejecuta la función SaveScore cuando se cambia de escena
        SceneManager.activeSceneChanged += SaveScore;

        //Obtiene el componente de TextMeshProUGUI y comienza a contar el tiempo y mostrarlo
        timeText = GetComponent<TextMeshProUGUI>();
        timeText.text = "Tiempo: " + time;
        StartCoroutine(ReduceScore());
    }

    public void SaveScore(Scene current, Scene next)
    {
        //Añade el tiempo utilizado al tiempo total y resetea el contador actual
        score += time;
        time = 0;
    }


    IEnumerator ReduceScore()
    {
        //Incrementa el tiempo y lo actualiza cada segundo
        while (true)
        {
            yield return new WaitForSeconds(1);
            time++;
            timeText.text = "Tiempo: " + time;
        }
    }

}