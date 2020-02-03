package barbero;

public class Main {

    public static void main(String[] args) {
        final int N = 125;
        Barberia b = new Barberia();
        Barbero bar = new Barbero(b);
        Cliente[] c = new Cliente[N];

        for (int i = 0; i < N; i++)
            c[i] = new Cliente(b, i);

        Thread bh = new Thread(bar);
        bh.start();
        Thread[] ch = new Thread[N];

        for (int i = 0; i < N; i++)
            ch[i] = new Thread(c[i]);

        for (int i = 0; i < N; i++)
            ch[i].start();
    }
}