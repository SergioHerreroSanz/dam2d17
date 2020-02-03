package ClienteServidorFecha;

import java.io.IOException;
import java.io.PrintWriter;
import java.net.Socket;
import java.text.SimpleDateFormat;
import java.util.Date;

public class ManejadorClientes implements Runnable {
    Socket cliente;

    ManejadorClientes(Socket nuevoCliente) {
        cliente = nuevoCliente;
    }

    @Override
    public void run() {
        SimpleDateFormat formatter = new SimpleDateFormat("HH:mm:ss dd-MM-yyyy");
        Date date = new Date(System.currentTimeMillis());
        String fecha = formatter.format(date);

        PrintWriter writer = null;
        try {
            writer = new PrintWriter(cliente.getOutputStream(), true);
            writer.println(fecha);
        } catch (IOException e) {
            e.printStackTrace();
        } finally {
            try {
                cliente.close();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }
}
