package cajero;

public class Persona extends Thread {
    public int efectivo = 0;

    @Override
    public void run() {
        for (int i = 0; i<4; i++) {
            efectivo += CuentaBancaria.retirarDinero(10);
        }
    }

    public int getEfectivo() {
        return efectivo;
    }
}
