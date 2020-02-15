package chatMulticast;

import java.io.IOException;
import java.net.DatagramPacket;
import java.net.InetAddress;
import java.net.MulticastSocket;
import java.util.Scanner;

public class Retransmitir implements Runnable {
    Scanner myScan = new Scanner(System.in);
    MulticastSocket multicastSocket;
    InetAddress inetAddress;

    public Retransmitir(MulticastSocket multicastSocket, InetAddress inetAddress) {
        this.multicastSocket = multicastSocket;
        this.inetAddress = inetAddress;
    }

    @Override
    public void run() {
        byte[] datos;
        while (true) {
            try {
                datos = myScan.nextLine().getBytes();
                DatagramPacket datagramPacket = new DatagramPacket(datos,datos.length,inetAddress,4444 );
                multicastSocket.send(datagramPacket);
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }
}
