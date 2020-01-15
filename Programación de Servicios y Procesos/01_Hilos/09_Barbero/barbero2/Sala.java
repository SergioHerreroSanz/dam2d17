package barbero2;

public class Sala {
    private int sillasEspera;

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

    public synchronized void liberarSillaEspera() {
        sillasEspera++;
    }
}
