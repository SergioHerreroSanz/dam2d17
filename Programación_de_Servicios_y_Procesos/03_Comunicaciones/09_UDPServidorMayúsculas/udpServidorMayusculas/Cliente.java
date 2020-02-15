package udpServidorMayusculas;

import java.io.IOException;
import java.net.*;
import java.util.Arrays;
import java.util.Scanner;

public class Cliente {
    public static void main(String[] args) {
        try {
            Scanner myScanner = new Scanner(System.in);
            DatagramSocket datagramSocket = new DatagramSocket();

            byte[] datos = myScanner.nextLine().getBytes();
            datagramSocket.send(new DatagramPacket(datos, datos.length, InetAddress.getByName("localhost"), 4444));

            DatagramPacket recibir = new DatagramPacket(datos, datos.length);
            datagramSocket.receive(recibir);
            datos = recibir.getData();

            for (byte dato : datos) {
                System.out.print((char) dato);
            }

            datagramSocket.close();
        } catch (UnknownHostException e) {
            e.printStackTrace();
        } catch (SocketException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}
