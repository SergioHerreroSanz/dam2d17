package urlConnection;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.URL;
import java.net.URLConnection;
import java.util.Scanner;

public class Main {
    public static void main(String[] args) throws IOException {
        Scanner myScan = new Scanner(System.in);

        System.out.print("Introduce URL (con http://) > ");
        String urlString = myScan.nextLine();

        URL url = null;
        URLConnection connection = null;

        url = new URL(urlString);
        connection = url.openConnection();
        BufferedReader br = new BufferedReader(new InputStreamReader(connection.getInputStream()));
        String line;
        while ((line = br.readLine()) != null)
            System.out.println(line);
        br.close();
    }
}
