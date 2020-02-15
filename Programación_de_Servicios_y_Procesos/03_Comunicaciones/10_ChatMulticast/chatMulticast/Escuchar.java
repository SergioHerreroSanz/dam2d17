package chatMulticast;

import java.io.IOException;
import java.net.DatagramPacket;
import java.net.MulticastSocket;

public class Escuchar implements Runnable {
    MulticastSocket multicastSocket;

    public Escuchar(MulticastSocket multicastSocket) {
        this.multicastSocket = multicastSocket;
    }

    @Override
    public void run() {
        while (true) {
            try {
                byte[] datos = new byte[256];
                DatagramPacket datagramPacket = new DatagramPacket(datos, datos.length);
                multicastSocket.receive(datagramPacket);
                datos = datagramPacket.getData();
                for (byte dato : datos) {
                    System.out.print((char) dato);
                }
                System.out.println("");
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }
}
