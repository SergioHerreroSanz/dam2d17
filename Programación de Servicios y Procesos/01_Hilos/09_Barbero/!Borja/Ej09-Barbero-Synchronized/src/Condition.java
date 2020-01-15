public class Condition {

    public Condition() {
    }

    public synchronized void delay() {
        try {
            wait();   // suspende a la hebra que lo ejecuta
        } catch (Exception e) {
        }
        ;
    }

    public synchronized void resume() {
        try {
            notify(); // despierta una hebra suspendida
        } catch (Exception e) {
        }
        ;
    }

}
