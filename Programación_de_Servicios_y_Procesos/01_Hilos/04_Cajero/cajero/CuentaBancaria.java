package cajero;

public class CuentaBancaria {
    private int saldo = 100;

    public synchronized int retirarDinero(int dineroSacar) {
        if (saldo >= dineroSacar){
            try {
                Thread.sleep(500);
            } catch (Exception e) {
                System.out.println(e);
            }
            saldo -= dineroSacar;
            return dineroSacar;
        } else {
            return 0;
        }
    }

    public int getSaldo() {
        return saldo;
    }
}
