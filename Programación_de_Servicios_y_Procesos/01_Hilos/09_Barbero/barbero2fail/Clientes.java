package barbero2fail;

public class Clientes implements Runnable {
    private int id;

    public Clientes(int id) {
        this.id = id;
    }

    @Override
    public void run() {
        if (Main.sala.ocuparSillaEspera(id)) {
            while (!Main.sala.ocuparSillaBarbero(id)) {
                //Si no ocupa la silla
                esperar();
            }
            Main.sala.liberarSillaBarbero(id);

        } else {
            System.out.println(id + " Hola, esta lleno, Adiós");
            despertar();
        }
    }

    private synchronized void esperar() {
        try {
            wait();
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }

    private synchronized void despertar() {
        notifyAll();
    }
}
