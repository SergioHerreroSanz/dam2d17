package filosofos;

public class Palillos {
    private boolean usado = false;

    public synchronized boolean coger() {
        if (usado == false) {
            usado = true;
            return true;
        }
        return false;
    }
    public synchronized boolean soltar() {
        if (usado == true) {
            usado = false;
            return false;
        }
        return true;
    }
}
