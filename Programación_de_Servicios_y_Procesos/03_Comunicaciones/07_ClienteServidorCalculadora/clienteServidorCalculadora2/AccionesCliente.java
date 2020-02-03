package clienteServidorCalculadora2;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.Socket;

class AccionesCliente {
    public static final String SUMA = "+";
    public static final String RESTA = "-";
    public static final String MULTIPLICACION = "*";
    public static final String DIVISION = "/";


    public static String calcular(int num1, int num2, String operacion) throws IOException {
        Socket socket = new Socket("localhost", 4444);
        String operacionServidor = null;
        String salida = null;

        switch (operacion) {
            case SUMA:
                operacionServidor = "+";
                break;
            case RESTA:
                operacionServidor = "-";
                break;
            case MULTIPLICACION:
                operacionServidor = "*";
                break;
            case DIVISION:
                operacionServidor = "/";
                break;
        }

        try {
            PrintWriter writer = new PrintWriter(socket.getOutputStream(), true);
            writer.println(num1);
            writer.println(num2);
            writer.println(operacionServidor);

            BufferedReader br = new BufferedReader(new InputStreamReader(socket.getInputStream()));

            String line;
            while ((line = br.readLine()) != null) {
                salida += line;
            }
        } catch (Exception e) {
            e.printStackTrace();
        } finally {
            socket.close();
            return salida;
        }
    }
}
