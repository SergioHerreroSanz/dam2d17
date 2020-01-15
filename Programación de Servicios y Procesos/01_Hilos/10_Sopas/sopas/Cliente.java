package sopas;

public class Cliente implements Runnable {
    private boolean comido = false;
    private Cocinero cocinero;

    @Override
    public void run() {
        while (!comido) {
            if (Main.cocinero.tryComer()) {
                try {
                    Thread.sleep(1500);
                    comido = true;
                    System.out.println("[" + Main.cocinero.getCuencosLlenos() + "] He comido");
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
            } else {
                Main.cocinero.cocinar();
            }
        }
    }
}
