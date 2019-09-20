package calculadoraHumana;

public class CuentaAtras{
    public static void main(String[] args) {
        Calculadora calc = new Calculadora();
        calc.start();
        try {
            Thread.sleep(10000);
        } catch (InterruptedException e) {
            System.out.println(e);
        }
        calc.stop();
    }
}
