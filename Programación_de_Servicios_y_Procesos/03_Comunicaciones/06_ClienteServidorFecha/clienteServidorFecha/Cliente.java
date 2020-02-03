package ClienteServidorFecha;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.*;

public class Cliente {
    public static void main(String[] args) throws IOException {
        InetAddress inetAddress = InetAddress.getByName("localhost");
        SocketAddress socketAddress = new InetSocketAddress(inetAddress, 4444);
        Socket socket = new Socket();

        try {
            socket.connect(socketAddress);
            BufferedReader br = new BufferedReader(new InputStreamReader(socket.getInputStream()));

            String line;
            while ((line = br.readLine()) != null) {
                System.out.println(line);
            }
        } catch (Exception e) {
            System.out.println("Servidor no responde");
        }
        socket.close();
    }
}
