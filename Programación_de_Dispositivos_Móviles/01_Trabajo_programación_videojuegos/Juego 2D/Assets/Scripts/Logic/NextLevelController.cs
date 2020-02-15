using System.Collections;
using System.Collections.Generic;
using UnityEditor;
using UnityEngine;
using UnityEngine.SceneManagement;

/// <summary>
/// Controla que puerta está activa
/// </summary>
public class NextLevelController : MonoBehaviour
{
    private GameObject lockedDoor;
    private GameObject unlockedDoor;

    public void Start()
    {
        //Obtiene las puertas
        lockedDoor = GameObject.Find("LockedDoor");
        unlockedDoor = GameObject.Find("UnlockedDoor");
        //Activa la puerta bloqueada y desactiva la desbloqueada
        lockedDoor.SetActive(true);
        unlockedDoor.SetActive(false);
    }

    public void UnlockDoor()
    {
        //Activa la puerta desbloqueada y desactiva la bloqueada
        lockedDoor.SetActive(false);
        unlockedDoor.SetActive(true);
    }

}
