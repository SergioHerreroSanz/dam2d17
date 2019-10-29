package ascensor;

public class Persona implements Runnable {
    private String nombre;
    private int peso;

    public Persona(String nombre, int peso) {
        this.nombre = nombre;
        this.peso = peso;
    }

    @Override
    public void run() {
        boolean subido = false;
        while (!subido) {
            subido = Main.ascensor.subirAscensor(nombre, peso);
        }
        try {
            Thread.sleep(2000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
        Main.ascensor.bajarAscensor(nombre, peso);
    }

}
