package cajero;

public class Main {
    public static void main(String[] args) {
        Persona[] personas = new Persona[10];
        for (int i = 0; i < 10; i++) {
            personas[i] = new Persona();
        }
        for (int i = 0; i < 10; i++) {
            personas[i].start();
        }
        while (CuentaBancaria.getSaldo()>0){}
        System.out.println("El saldo de la cuenta es "+CuentaBancaria.saldo+"€.");
        for (int i = 0; i < 10; i++) {
            System.out.println("Persona "+i+" ha sacado "+personas[i].getEfectivo()+"€.");
        }
    }
}
