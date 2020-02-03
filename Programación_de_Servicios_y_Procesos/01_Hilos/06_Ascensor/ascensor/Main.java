package ascensor;

import java.util.ArrayList;
import java.util.Scanner;

public class Main {
    static int numPersonas;
    static int pesoMaximo;
    public static Ascensor ascensor;

    public static void main(String[] args) {
        Scanner myScan = new Scanner(System.in);
        System.out.print("Número de personas: ");
        numPersonas = myScan.nextInt();
        System.out.print("Peso máximo del ascensor: ");
        pesoMaximo = myScan.nextInt();

        ascensor = new Ascensor(pesoMaximo);
        System.out.println("Inicio simulación ascensor [PESO MÁXIMO " + pesoMaximo + "]");

        ArrayList<Persona> personas = new ArrayList<Persona>();
        for (int i = 0; i < numPersonas; i++) {
            String nombre = Persona.nombres[(int) (Math.random() * 100)];
            int peso = (int) (Math.random() * 50 + 40);
            personas.add(new Persona(nombre, peso));
        }

        ArrayList<Thread> hilos = new ArrayList<Thread>();
        for (Persona persona : personas) {
            hilos.add(new Thread(persona));
        }

        for (Thread hilo : hilos) {
            hilo.start();
        }

        for (Thread hilo : hilos) {
            try {
                hilo.join();
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
        }

        System.out.println("Fin simulación ascensor");
    }
}
