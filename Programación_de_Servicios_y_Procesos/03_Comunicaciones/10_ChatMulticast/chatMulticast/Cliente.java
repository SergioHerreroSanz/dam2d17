package chatMulticast;

import java.io.IOException;
import java.net.InetAddress;
import java.net.MulticastSocket;

public class Cliente {
    public static String host = "224.0.0.5";
    public static int puerto = 4444;

    public static void main(String[] args) {
        try {
            MulticastSocket multicastSocket = new MulticastSocket(puerto);
            InetAddress inetAddress = InetAddress.getByName(host);

            multicastSocket.joinGroup(inetAddress);

            new Thread(new Escuchar(multicastSocket)).start();
            new Thread(new Retransmitir(multicastSocket, inetAddress)).start();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}
