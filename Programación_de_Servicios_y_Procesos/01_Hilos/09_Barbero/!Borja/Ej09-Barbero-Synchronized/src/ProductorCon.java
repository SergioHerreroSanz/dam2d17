public class ProductorCon implements Runnable {
    Buffer2 b;
    int id = 0;

    public ProductorCon(Buffer2 b) {
        this.b = b;
    }

    public void run() {
        for (id = 0; id <= 19; id++) {
            System.out.println("Llego el cliente : " + id + "  y espera a ser atendido");
            try {
                Thread.sleep(1000);
                b.esperaturno(id);
            } catch (Exception e) {
            }
            ;
        }
    }

}