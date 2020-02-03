package barbero;

public class Barbero implements Runnable {
    Barberia b;

    public Barbero(Barberia b) {
        this.b = b;
    }

    @Override
    public void run() {
        while (true) {
            b.siguiente();
            System.out.println("Barbero Pela Cliente");
            // Barbero pela cliente
            b.finPelar();
        }
    }
}