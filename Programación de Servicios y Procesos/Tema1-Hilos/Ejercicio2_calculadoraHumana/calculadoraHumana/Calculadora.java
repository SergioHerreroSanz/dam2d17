package calculadoraHumana;

import java.util.Scanner;

public class Calculadora extends Thread {
    @Override
    public void run() {
        Scanner myScan= new Scanner(System.in);
        int num1;
        int num2;
        int respuesta;
        int puntuacion = 0;

        while(true) {
            num1 = (int) (Math.random() * 100);
            num2 = (int) (Math.random() * 100);

            System.out.print(num1 + " + " + num2 + " = ");
            respuesta = myScan.nextInt();

            if (respuesta == num1 + num2) {
                puntuacion++;
                System.out.print("¡Respuesta correcta!");
            } else {
                System.out.print("¡Respuesta incorrecta!");
            }

            System.out.println(" Puntuación: " + puntuacion);
        }
    }
}
