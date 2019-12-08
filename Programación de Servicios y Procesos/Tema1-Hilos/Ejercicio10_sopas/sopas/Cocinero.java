package sopas;

public class Cocinero implements Runnable {
    private int CUENCOS_DISPONIBLES;
    private int cuencosLlenos;

    public Cocinero(int cuencos) {
        this.CUENCOS_DISPONIBLES = cuencos;
        this.cuencosLlenos = cuencos;
    }

    public int getCuencosLlenos() {
        return cuencosLlenos;
    }

   @Override
    public void run() {
        cocinar();
    }

    public synchronized void cocinar() {
        try {
            Thread.sleep(CUENCOS_DISPONIBLES * 1000);
            cuencosLlenos = CUENCOS_DISPONIBLES;
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
        System.out.println("He cocinado " + CUENCOS_DISPONIBLES + " cuencos de sopa");
    }

    public synchronized boolean tryComer() {
        if (cuencosLlenos > 0) {
            cuencosLlenos--;
            return true;
        }
        return false;
    }
}
