package clienteWhois;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.Socket;
import java.util.Scanner;

public class Main {
    public static void main(String[] args) throws IOException {
        Scanner myScan = new Scanner(System.in);
        String dominio;
        int puerto;

        Socket socket = new Socket("whois.internic.net", 43);

        System.out.print("Introduce dominio > ");
        dominio = myScan.nextLine();
        /*
        System.out.print("Introduce puerto > ");
        puerto = myScan.nextInt();
        myScan.nextLine();
        */

        PrintWriter pw = new PrintWriter(socket.getOutputStream(), true);
        pw.println(dominio);

        BufferedReader br = new BufferedReader(new InputStreamReader(socket.getInputStream()));
        String line;
        while ((line = br.readLine()) != null) {
            System.out.println(line);
        }

        socket.close();
    }
}
