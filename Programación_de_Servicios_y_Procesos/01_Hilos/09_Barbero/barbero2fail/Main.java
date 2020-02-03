package barbero2fail;

import java.util.ArrayList;

public class Main {
    private final static int SILLAS_DISPONIBLES = 4;
    private final static int CLIENTES = 10;
    public static Sala sala = new Sala(SILLAS_DISPONIBLES);

    public static void main(String[] args) {
        ArrayList<Clientes> clientes = new ArrayList<Clientes>();
        for (int i = 0; i < CLIENTES; i++) {
            clientes.add(new Clientes(i));
        }

        ArrayList<Thread> hilos = new ArrayList<Thread>();
        for (Clientes cliente : clientes) {
            hilos.add(new Thread(cliente));
        }

        for (Thread hilo : hilos) {
            hilo.start();
            try {
                Thread.sleep(1500);
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
        }
    }
}
