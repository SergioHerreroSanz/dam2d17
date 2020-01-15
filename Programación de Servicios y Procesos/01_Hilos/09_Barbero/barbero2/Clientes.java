package barbero2;

public class Clientes implements Runnable {
    private int id;

    public Clientes(int id) {
        this.id = id;
    }

    @Override
    public void run() {
        boolean ocupaSilla = Main.sala.ocuparSillaEspera(id);
        if (ocupaSilla) {
            boolean peloCortado = false;
            while (!peloCortado) {
                peloCortado = Main.barberos.cortarPelo(id);
            }
        } else {
            System.out.println(id + " Hola, esta lleno, Adiós");
        }
    }
}
