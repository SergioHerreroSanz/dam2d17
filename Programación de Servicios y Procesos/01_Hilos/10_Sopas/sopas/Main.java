package sopas;

import java.util.ArrayList;

public class Main {
    private final static int CUENCOS_DISPONIBLES = 4;
    private final static int CLIENTES = 10;
    public static Cocinero cocinero = new Cocinero(CUENCOS_DISPONIBLES);

    public static void main(String[] args) {
        ArrayList<Cliente> clientes = new ArrayList<Cliente>();
        for (int i = 0; i < CLIENTES; i++) {
            clientes.add(new Cliente());
        }

        ArrayList<Thread> hilos = new ArrayList<Thread>();
        for (Cliente cliente : clientes) {
            hilos.add(new Thread(cliente));
        }

        for (Thread hilo : hilos) {
            hilo.start();
            try {
                hilo.join();
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
        }
    }
}
