package portScanner;

import java.io.IOException;
import java.net.InetAddress;
import java.net.InetSocketAddress;
import java.net.Socket;
import java.net.SocketAddress;

public class Main {
    public static void main(String[] args) throws IOException {
        InetAddress inetAddress = InetAddress.getByName("localhost");
        for (int i = 0; i < 65535; i++) {
            SocketAddress socketAddress = new InetSocketAddress(inetAddress, i);
            Socket socket = new Socket();

            try { socket.connect(socketAddress, 1); } catch (Exception e) { }

            if (socket.isConnected()) {
                System.out.println("Puerto " + i + " abierto.");
            }
        }
    }
}
