public class ConsumidorCon implements Runnable {
    int d = 0;
    Buffer2 b;
    int id;

    public ConsumidorCon(Buffer2 b) {
        this.b = b;
    }

    public void run() {
        for (int id = 0; id <= 19; id++) {
            try {
                Thread.sleep(1001);
                //System.out.println("Barbero corta cabello al cliente ");
                d = b.atiende();
            } catch (InterruptedException e) {
            }
            ;
        }
    }
}
