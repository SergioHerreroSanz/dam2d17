package barbero;

import java.util.concurrent.locks.Condition;
import java.util.concurrent.locks.Lock;
import java.util.concurrent.locks.ReentrantLock;

public class Barberia {

    private Lock BLock = new ReentrantLock();

    private Condition cBlibre = BLock.newCondition();
    private Condition cSillaOcupada = BLock.newCondition();
    private Condition cPuertaAbierta = BLock.newCondition();
    private Condition cSiguiente = BLock.newCondition();

    private boolean Blibre = false;
    private boolean SillaOcupada = false;
    private boolean PAbierta = false;

    public void siguiente() {
        BLock.lock();
        try {
            System.out.println("Barbero libre");
            Blibre = true;
            cBlibre.signal();
            while (!SillaOcupada)
                try {
                    cSillaOcupada.await();
                } catch (InterruptedException e) {
                }

        } finally {
            BLock.unlock();
        }
    }

    public void finPelar() {
        BLock.lock();
        try {
            PAbierta = true;
            cPuertaAbierta.signal();
            while (PAbierta)
                try {
                    cSiguiente.await();
                } catch (InterruptedException e) {
                }
            ;

        } finally {
            BLock.unlock();
        }
    }

    public void qPelar(int i) {
        BLock.lock();
        try {
            while (!Blibre)
                try {
                    cBlibre.await();
                } catch (InterruptedException e) {
                }
            ;
            Blibre = false;
            SillaOcupada = true;
            System.out.println("Cliente " + i + " se sienta en la silla");
            cSillaOcupada.signal();
            while (!PAbierta)
                try {
                    cPuertaAbierta.await();
                } catch (InterruptedException e) {
                }
            ;
            System.out.println("Cliente " + i + " se va");
            PAbierta = false;
            cSiguiente.signal();
        } finally {
            BLock.unlock();
        }
    }

    public void Pelar(int i) {
        BLock.lock();
        try {
            while (!Blibre)
                try {
                    cBlibre.await();
                } catch (InterruptedException e) {
                }
            ;
            Blibre = false;
            SillaOcupada = true;
            System.out.println("Cliente " + i + " se sienta en la silla");
            cSillaOcupada.signal();
            while (!PAbierta)
                try {
                    cPuertaAbierta.await();
                } catch (InterruptedException e) {
                }
            ;
            System.out.println("Cliente " + i + " se va");
            PAbierta = false;
            cSiguiente.signal();
        } finally {
            BLock.unlock();
        }
    }
}
