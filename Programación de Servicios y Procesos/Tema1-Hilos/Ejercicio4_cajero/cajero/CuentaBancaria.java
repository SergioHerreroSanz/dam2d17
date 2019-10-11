package cajero;

public class CuentaBancaria {
    public int saldo = 100;

    public int retirarDinero(int dineroSacar) {
        if (saldo >= dineroSacar){
            try {
                Thread.sleep(500);
            } catch (Exception e) {
                System.out.println(e);
            }
            saldo -= dineroSacar;
            return dineroSacar;
        }
    }

    public int getSaldo() {
        return saldo;
    }
}
