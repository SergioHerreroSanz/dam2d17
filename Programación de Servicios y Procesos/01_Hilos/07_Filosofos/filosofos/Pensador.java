package filosofos;

public class Pensador implements Runnable {
    private int comido = 0;
    private String id;
    private Palillos palilloIzq;
    private Palillos palilloDcha;
    private boolean cogidoIzq = false;
    private boolean cogidoDcha = false;
    private boolean haComido = false;

    public Pensador(String id, Palillos palilloIzq, Palillos palilloDcha) {
        this.id = id;
        this.palilloIzq = palilloIzq;
        this.palilloDcha = palilloDcha;
    }

    @Override
    public void run() {
        while (true) {
            if (!haComido) {
                try {
                    Thread.sleep((long) (Math.random() * 1000));
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
                //haComido = !haComido;
            }

            cogidoIzq = palilloIzq.coger();

            if (cogidoIzq) {
                System.out.println(id + " [" + comido + "] ha cogido el palillo izq.");
                cogidoDcha = palilloDcha.coger();

                if (cogidoDcha) {
                    System.out.println(id + " [" + comido + "] ha cogido el palillo dcha.");
                    try {
                        Thread.sleep((long) (Math.random() * 1000));
                    } catch (InterruptedException e) {
                        e.printStackTrace();
                    }
                    comido++;
                    cogidoIzq = palilloIzq.soltar();
                    cogidoDcha = palilloDcha.soltar();
                    System.out.println(id + " [" + comido + "] ha comido y dejado ambos palillos.");
                    //haComido = !haComido;
                } else {
                    cogidoIzq = palilloIzq.soltar();
                    System.out.println(id + " [" + comido + "] ha dejado el palillo izq.");
                }
            }
        }
    }
}
