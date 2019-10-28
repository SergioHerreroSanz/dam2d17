package parking2;

public class Coche implements Runnable {
    private boolean aparcado = false;
    private int id;

    public Coche(int id) {
        this.id = id;
    }

    @Override
    public void run() {
        while(!aparcado) {
            aparcado = Main.parking.aparcar(id);
        }

        try {
            Thread.sleep((long) (Math.random()*5000));
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        Main.parking.liberarPlaza(id);
        aparcado=false;
    }
}
