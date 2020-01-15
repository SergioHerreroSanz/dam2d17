package parking2;

public class Parking {
    private int plazas;

    public Parking(int plazas) {
        this.plazas = plazas;
    }

    public synchronized boolean aparcar(int id) {
        if (plazas>0) {
            plazas--;
            System.out.println("Coche "+id+" aparcado.");
            return true;
        } else {
            System.out.println("Coche "+id+" esperando.");
            try {
                wait();
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
            return false;
        }

    }

    public synchronized void liberarPlaza(int id) {
        plazas++;
        System.out.println("Coche "+id+" deja una plaza libre.");
        notifyAll();
    }
}

