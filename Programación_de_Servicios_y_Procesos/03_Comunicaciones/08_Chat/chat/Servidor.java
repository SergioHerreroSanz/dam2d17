package chat;

import java.io.IOException;
import java.io.PrintWriter;
import java.net.ServerSocket;
import java.net.Socket;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;

public class Servidor {

    private static ArrayList<Socket> sockets = new ArrayList<Socket>();
    private static ArrayList<Thread> threadsLeer = new ArrayList<Thread>();


    public static void main(String[] args) throws IOException {
        ServerSocket serverSocket = new ServerSocket(4444);

        while (true) {
            Socket socket;
            socket = acceptClient(serverSocket);
            sockets.add(socket);

            Thread threadLeer = new Thread(new Escuchar(socket));
            threadLeer.start();
        }
    }

    private static Socket acceptClient(ServerSocket serverSocket) {
        Socket nuevoCliente = null;
        try {
            nuevoCliente = serverSocket.accept();
        } catch (Exception e) {
            System.out.println(e.getStackTrace());
        }
        return nuevoCliente;
    }

    public static synchronized void retransmitir(String mensaje) {
        LocalDateTime myDateObj = LocalDateTime.now();
        DateTimeFormatter myFormatObj = DateTimeFormatter.ofPattern("dd-MM-yyyy HH:mm:ss");
        String hora = "[" + myDateObj.format(myFormatObj) + "] ";

        for (Socket socket : sockets) {
            try {
                PrintWriter writer = new PrintWriter(socket.getOutputStream(), true);
                writer.println(hora + mensaje);
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }
}