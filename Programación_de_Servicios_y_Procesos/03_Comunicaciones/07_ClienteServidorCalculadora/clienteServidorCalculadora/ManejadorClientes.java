package ClienteServidorCalculadora;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.Socket;

public class ManejadorClientes implements Runnable {
    Socket cliente;

    ManejadorClientes(Socket nuevoCliente) {
        cliente = nuevoCliente;
    }

    @Override
    public void run() {
        int num1;
        int num2;
        String operacion;
        double salida;

        try {
            BufferedReader br = new BufferedReader(new InputStreamReader(cliente.getInputStream()));
            num1 = Integer.parseInt(br.readLine());
            num2 = Integer.parseInt(br.readLine());
            operacion = br.readLine();
            switch (operacion) {
                case "+":
                    salida = num1 + num2;
                    break;
                case "-":
                    salida = num1 - num2;
                    break;
                case "*":
                    salida = num1 / num2;
                    break;
                case "/":
                    salida = num1 / (double) num2;
                    break;
                default:
                    salida = Integer.parseInt(null);
            }
            PrintWriter writer = new PrintWriter(cliente.getOutputStream(), true);
            writer.println(salida);

        } catch (IOException e) {
            e.printStackTrace();
        } finally {
            try {
                cliente.close();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }
}

