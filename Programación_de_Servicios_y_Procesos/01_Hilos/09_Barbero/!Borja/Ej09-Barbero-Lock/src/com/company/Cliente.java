package barbero;

public class Cliente implements Runnable {

    Barberia b;
    int id;

    public Cliente(Barberia b, int i) {
        this.b = b;
        id = i;
    }

    @Override
    public void run() {
        b.qPelar(id);
    }
}
