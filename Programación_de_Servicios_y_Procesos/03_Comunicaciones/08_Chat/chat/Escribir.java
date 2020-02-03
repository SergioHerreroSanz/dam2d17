package chat;

import java.io.IOException;
import java.io.PrintWriter;
import java.net.Socket;
import java.util.Scanner;

public class Escribir implements Runnable {
    Socket socket;
    String name;

    public Escribir(Socket socket, String name) {
        this.socket = socket;
        this.name = name;
    }

    @Override
    public void run() {
        Scanner myScan = new Scanner(System.in);
        PrintWriter writer = null;
        try {
            writer = new PrintWriter(socket.getOutputStream(), true);
            while (true) {
                writer.println(name + ": " + myScan.nextLine());
            }
        } catch (IOException e) {
            e.printStackTrace();
        }

    }
}
