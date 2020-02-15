using System.Collections;
using System.Collections.Generic;
using UnityEngine;

/// <summary>
/// Controla que bloques deben de caer en cascada tras una llamada de FallingCascadeController
/// </summary>
public class FallingCascadeController : MonoBehaviour
{
    [SerializeField] private FallingGroundController[] fallingGroundControllers;

    private void Start()
    {
        //Toma todos los bloques introducidos por parámetro y les asigna una posición (vale como identificador)
        int i = 0;
        foreach (var element in fallingGroundControllers) { element.setId(i); i++; }
    }

    //Fuerza la caida de los bloques colindantes al bloque que realiza la llamada al método
    public void WarnNeighbour(int i)
    {
        if (i - 1 >= 0)
        {
            fallingGroundControllers[i - 1].ForceFall(0.1f);
        }
        if (i + 1 <= fallingGroundControllers.Length)
        {
            fallingGroundControllers[i + 1].ForceFall(0.1f);
        }
    }
}
