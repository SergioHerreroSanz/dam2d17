public class Buffer2 {
    private int[] b;
    private int tam;
    private int i = 0;
    private int j = 0;
    private int numDatos = 0;
    private final Condition nolleno = new Condition();
    private final Condition novacio = new Condition();

    public Buffer2(int t) {
        tam = t;
        b = new int[tam];
    }

    public synchronized void esperaturno(int d) throws InterruptedException {
        while (numDatos == tam)
            novacio.delay();

        b[i] = d;
        i = (i + 1); //% tam;
        numDatos++;
        novacio.resume();
    }

    public synchronized int atiende() throws InterruptedException {
        while (numDatos == 0)
            nolleno.delay();

        int aux = j;
        j = (j + 1);// % tam;
        numDatos--;
        nolleno.resume();
        System.out.println("Barbero corta cabello al cliente " + aux);
        System.out.println("Barbero atendio al cliente: " + aux);
        System.out.println("Cliente " + aux + " se va agradecido\n");
        return b[aux];

    }
}