package cajero;

import java.util.ArrayList;

public class Main {
    public static CuentaBancaria cuenta = new CuentaBancaria();
    public static void main(String[] args) {
        System.out.println("Empieza");

        ArrayList<Persona> personas = new ArrayList<Persona>();
        for (int i = 0; i < 10; i++) {
            personas.add(new Persona());
        }

        ArrayList<Thread> hilos = new ArrayList<Thread>();
        for (Persona persona: personas) {
            hilos.add(new Thread(persona));
        }

        for (Thread hilo: hilos) {
            hilo.start();
        }

        for (Thread hilo: hilos) {
            try {
                hilo.join();
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
        }

        while (cuenta.getSaldo()>0){}
        System.out.println("El saldo de la cuenta es "+cuenta.getSaldo()+"€.");
        for (Persona persona: personas) {
            System.out.println("Persona ha sacado "+persona.getEfectivo()+"€.");
        }
    }
}
