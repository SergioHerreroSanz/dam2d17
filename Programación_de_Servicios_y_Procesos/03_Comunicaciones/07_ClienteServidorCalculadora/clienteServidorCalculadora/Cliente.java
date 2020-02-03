package ClienteServidorCalculadora;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.InetAddress;
import java.net.InetSocketAddress;
import java.net.Socket;
import java.net.SocketAddress;

public class Cliente {
    public static void main(String[] args) throws IOException {
        int num1 = 2;
        int num2 = 3;
        String operacion = "+";

        Socket socket = new Socket("localhost",4444);

        try {
            PrintWriter writer = new PrintWriter(socket.getOutputStream(), true);
            writer.println(num1);
            writer.println(num2);
            writer.println(operacion);

            BufferedReader br = new BufferedReader(new InputStreamReader(socket.getInputStream()));

            String line;
            while ((line = br.readLine()) != null) {
                System.out.println(line);
            }
        } catch (Exception e) {
            System.out.println("Servidor no responde");
            e.printStackTrace();
        }
        socket.close();
    }
}
