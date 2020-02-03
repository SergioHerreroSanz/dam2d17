public class ProduConsCond {

    public static void main(String[] args) {
        Buffer2 b = new Buffer2(20);

        ProductorCon pc = new ProductorCon(b);
        ConsumidorCon cc = new ConsumidorCon(b);
        //System.out.println("comienza el programa");
        Thread ph = new Thread(pc);
        Thread ch = new Thread(cc);

        ph.start();
        ch.start();

    }

}
