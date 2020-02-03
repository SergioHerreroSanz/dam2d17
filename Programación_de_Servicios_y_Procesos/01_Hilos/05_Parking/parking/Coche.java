package parking;

public class Coche implements Runnable {
    private boolean aparcado = false;

    @Override
    public void run() {
        while(!aparcado) {
            aparcado = Main.parking.aparcar();
        }

        try {
            Thread.sleep((long) (Math.random()*5000));
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        Main.parking.liberarPlaza();
        aparcado=false;
    }
}
