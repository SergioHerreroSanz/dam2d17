package parking3;

import java.util.ArrayList;
import java.util.Scanner;

public class Main {
    private static int cantidadCoches;
    private static int cantidadPlazas;

    public static Parking parking;

    public static void main(String[] args) {
        final Scanner myScan = new Scanner(System.in);
        System.out.print("¿Cuántas plazas hay? > ");
        cantidadPlazas = myScan.nextInt();
        System.out.print("¿Cuántos coches hay? > ");
        cantidadCoches = myScan.nextInt();

        parking = new Parking(cantidadPlazas);
        parking.imprimir();

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
