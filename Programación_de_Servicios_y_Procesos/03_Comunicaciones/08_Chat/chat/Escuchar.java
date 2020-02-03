package chat;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.Socket;

public class Escuchar implements Runnable {
    private Socket socket;

    public Escuchar(Socket socket) {
        this.socket = socket;
    }

    @Override
    public void run() {
        if (true) {
            BufferedReader br = null;
            while (true) {
                try {
                    br = new BufferedReader(new InputStreamReader(socket.getInputStream()));
                    String line;
                    while ((line = br.readLine()) != null) {
                        Servidor.retransmitir(line);
                    }
                } catch (IOException e) {
                    e.printStackTrace();
                }
            }
        }
    }
}
