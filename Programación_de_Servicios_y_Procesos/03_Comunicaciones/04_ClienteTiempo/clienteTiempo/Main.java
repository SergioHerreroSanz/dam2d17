package clienteTiempo;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.InetAddress;
import java.net.InetSocketAddress;
import java.net.Socket;
import java.net.SocketAddress;

public class Main {
    public static void main(String[] args) throws IOException {
        InetAddress inetAddress = InetAddress.getByName("time.nist.gov");
        SocketAddress socketAddress = new InetSocketAddress(inetAddress, 13);
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
