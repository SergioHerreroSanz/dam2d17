package ClienteServidorFecha;

import java.io.IOException;
import java.net.ServerSocket;
import java.net.Socket;

public class Servidor {
    public static void main(String[] args) throws IOException {
        ServerSocket serverSocket = new ServerSocket(4444);
        while (true) {
            try {
                Socket nuevoCliente = serverSocket.accept();
                new Thread(new ManejadorClientes(nuevoCliente)).start();
            } catch (Exception e) {
                e.printStackTrace();
            }
        }
    }
}
