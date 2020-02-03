package barbero2;

import java.util.Random;

public class Barberos {
    private int barberosDisponibles;

    public synchronized boolean cortarPelo(int id) {
        if (barberosDisponibles > 0) {
            barberosDisponibles--;
            Main.sala.liberarSillaEspera();
            System.out.println("[" + Main.sala.getSillasEspera() + "] " + id + " Me están cortando el pelo");
            try {
                Thread.sleep(new Random().nextInt(1000)+3000);
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
            System.out.println("(" + id + ") Done");
            barberosDisponibles++;
            notifyAll();
            return true;
        }
        return false;
    }
}
