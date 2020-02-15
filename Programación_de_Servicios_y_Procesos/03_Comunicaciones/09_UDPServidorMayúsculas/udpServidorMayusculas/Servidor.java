package udpServidorMayusculas;

import java.io.IOException;
import java.net.DatagramPacket;
import java.net.DatagramSocket;
import java.net.InetAddress;

public class Servidor {
    public static void main(String[] args) {
        try {
            DatagramSocket datagramSocket = new DatagramSocket(4444, InetAddress.getByName("localhost"));

            DatagramPacket recibir = new DatagramPacket(new byte[256], 256);
            datagramSocket.receive(recibir);
            System.out.println(recibir.getData());

            byte[] datos = recibir.getData();
            for (int i = 0; i < datos.length; i++) {
                datos[i] = (byte) Character.toUpperCase(datos[i]);
            }

            datagramSocket.send(new DatagramPacket(datos, datos.length, recibir.getAddress(), recibir.getPort()));

            datagramSocket.close();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}
