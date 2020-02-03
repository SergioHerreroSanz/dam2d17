package barbero2fail;

public class Sala {
    private int sillasEspera;
    private boolean sillaBarberoLibre = true;

    public Sala(int sillasEspera) {
        this.sillasEspera = sillasEspera;
    }

    public int getSillasEspera() {
        return sillasEspera;
    }

    public synchronized boolean ocuparSillaEspera(int id) {
        if (sillasEspera > 0) {
            sillasEspera--;
            System.out.println("[" + Main.sala.getSillasEspera() + "] " + id + " Hola, ocupo una silla de espera");
            return true;
        }
        return false;
    }

    public synchronized boolean ocuparSillaBarbero(int id) {
        if (sillaBarberoLibre) {
            sillaBarberoLibre = false;
            Main.sala.liberarSillaEspera();
            System.out.println("[" + Main.sala.getSillasEspera() + "] " + id + " Me están cortando el pelo");
            try {
                Thread.sleep((long) (Math.random() * 4000));
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
            return true;
        }
        return false;
    }

    public synchronized void liberarSillaBarbero(int id) {
        System.out.println("(" + id + ") Me han cortado el pelo");
        sillaBarberoLibre = true;
        notifyAll();
    }

    public synchronized void liberarSillaEspera() {
        sillasEspera++;
    }
}
