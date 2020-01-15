package filosofos;

import java.util.ArrayList;

public class Main {
    public static void main(String[] args) {
        int numPensadores = 5;

        ArrayList<Palillos> palillos = new ArrayList<Palillos>();
        for (int i = 0; i < numPensadores; i++) {
            palillos.add(new Palillos());
        }
        palillos.add(palillos.get(0));

        ArrayList<Pensador> pensadores = new ArrayList<Pensador>();
        for (int i = 0; i < numPensadores; i++) {
            pensadores.add(new Pensador("" + i, palillos.get(i), palillos.get(i + 1)));
        }

        ArrayList<Thread> hiloPensador = new ArrayList<Thread>();
        for (Pensador pensador : pensadores) {
            hiloPensador.add(new Thread(pensador));
        }

        for (Thread hilo : hiloPensador) {
            hilo.start();
        }
    }
}
