package chat;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.Socket;
import java.util.Scanner;

public class Cliente {
    public static void main(String[] args) {
        Scanner myScan = new Scanner(System.in);
        System.out.print("Introduca nombre > ");
        String name = myScan.nextLine();

        try {
            Socket socket = new Socket("localhost", 4444);
            new Thread(new Escribir(socket, name)).start();
            new Thread(new Leer(socket)).start();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}
