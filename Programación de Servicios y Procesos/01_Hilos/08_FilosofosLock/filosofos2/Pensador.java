package filosofos2;

import java.util.concurrent.locks.Lock;

public class Pensador implements Runnable {
    private int comido = 0;
    private String id;
    private Lock palilloIzq;
    private Lock palilloDcha;
    private boolean haComido = false;

    public Pensador(String id, Lock palilloIzq, Lock palilloDcha) {
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
                System.out.println(id + " [" + comido + "] ha pensado.");
                haComido = !haComido;
            }

            if (palilloIzq.tryLock()) {
                try {
                    if (palilloDcha.tryLock()) {
                        try {
                            Thread.sleep((long) (Math.random() * 1000));
                            comido++;
                            System.out.println(id + " [" + comido + "] ha comido.");
                            haComido = !haComido;
                        } catch (InterruptedException e) {
                            e.printStackTrace();
                        } finally {
                            palilloDcha.unlock();
                        }
                    }
                } finally {
                    palilloIzq.unlock();
                }

            }
        }
    }
}
