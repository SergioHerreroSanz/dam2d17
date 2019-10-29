package ascensor;

public class Ascensor implements Runnable {
    private int pesoMaximo;
    private int peso = 0;

    public Ascensor(int pesoMaximo) {
        this.pesoMaximo = pesoMaximo;
    }

    public int getPeso() {
        return peso;
    }

    public void setPeso(int peso) {
        this.peso = peso;
    }

    public int getPesoMaximo() {
        return pesoMaximo;
    }

    @Override
    public void run() {
    }

    public synchronized boolean subirAscensor(String nombre, int pesoPersona) {
        if (getPeso() + pesoPersona <= getPesoMaximo()) {
//            System.out.println("hola");
            Main.ascensor.setPeso(getPeso() + pesoPersona);
            System.out.println("[PESO TOTAL " + getPeso() + "] Se ha subido " + nombre + " " + pesoPersona);
            return true;
        } else {
            System.out.println("\t" + nombre + " " + pesoPersona + "kg esperando");
            try {
                wait();
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
            return false;
        }
    }

    public synchronized void bajarAscensor(String nombre, int pesoPersona) {
        setPeso(getPeso() - pesoPersona);
        System.out.println("[PESO TOTAL " + getPeso() + "] Se ha bajado " + nombre + " " + pesoPersona);
        notifyAll();
    }


}
