package calculadoraHumana;

public class CuentaAtras{
    public static void main(String[] args) throws InterruptedException {
        Calculadora calc = new Calculadora();
        System.out.print("Empezamos en: 3... ");
        Thread.sleep(1000);
        System.out.print("2... ");
        Thread.sleep(1000);
        System.out.print("1... ");
        Thread.sleep(1000);
        System.out.println("!YA!");
        calc.start();

        Thread.sleep(10000);
        calc.interrupt();
    }
}
