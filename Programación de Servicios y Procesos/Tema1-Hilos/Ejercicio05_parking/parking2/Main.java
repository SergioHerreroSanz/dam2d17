package parking2;

import java.util.ArrayList;

public class Main {
    private static int cantidadCoches = 6;
    private static int cantidadPlazas = 4;

    public static Parking parking = new Parking(cantidadPlazas);

    public static void main(String[] args) {
        ArrayList<Coche> coches = new ArrayList<Coche>();
        for (int i = 0; i < cantidadCoches; i++) {
            coches.add(new Coche(i+1));
        }

        ArrayList<Thread> hilos = new ArrayList<Thread>();
        for (Coche coche: coches) {
            hilos.add(new Thread(coche));
        }

        for (Thread hilo: hilos) {
            hilo.start();
        }
    }
}
