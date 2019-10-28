package cajero;

public class Persona implements Runnable {
    public int efectivo = 0;

    @Override
    public void run() {
        for (int i = 0; i<4; i++) {
            efectivo += Main.cuenta.retirarDinero(10);
        }
    }

    public int getEfectivo() {
        return efectivo;
    }
}
