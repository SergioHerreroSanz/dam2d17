package inetAddress;

import java.net.InetAddress;
import java.net.UnknownHostException;
import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        Scanner myScan = new Scanner(System.in);
        while (true) {
            System.out.print("Introduce host > ");
            String host = myScan.nextLine();
            InetAddress[] addresses = null;
            try {
                addresses = InetAddress.getAllByName(host);
                for (InetAddress address : addresses) {
                    System.out.println(address.getHostName() + " | " + address.getHostAddress());
                }

            } catch (UnknownHostException e) {
                System.out.println("No se encontró");
                //e.printStackTrace();
            }

        }
    }
}
