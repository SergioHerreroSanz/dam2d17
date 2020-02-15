using System.Collections;
using System.Collections.Generic;
using TMPro;
using UnityEngine;

/// <summary>
/// Actualiza el valor de las vidas restantes mostradas por pantalla obteniéndolas del Player
/// </summary>
public class LivesController : MonoBehaviour
{
    private int lives;
    private TextMeshProUGUI livesText;
    private PlayerController player;

    void Start()
    {
        //Obtiene el TextMeshProUGUI y el Player
        livesText = GetComponent<TextMeshProUGUI>();
        player = (PlayerController) GameObject.Find("Player").GetComponent("PlayerController");
    }

    void FixedUpdate()
    {
        //Cambia el texto mostrado en pantalla
        lives = player.lives;
        livesText.text = "Vidas: " + lives;
    }
}
