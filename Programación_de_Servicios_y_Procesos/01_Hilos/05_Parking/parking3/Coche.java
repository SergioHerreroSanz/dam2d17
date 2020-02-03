package parking3;

public class Coche implements Runnable {
    private boolean aparcado = false;
    private int id;

    public Coche(int id) {
        this.id = id;
    }

    @Override
    public void run() {
        //preparado
        while(!aparcado) {
            aparcado = Main.parking.aparcar(id);
        }

        try {
            Thread.sleep((long) (Math.random()*5000));
//            Thread.sleep((long) (1000));
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        Main.parking.liberarPlaza(id);
        aparcado=false;
    }
}
