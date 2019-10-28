package prioridades;

public class Main {
    public static void main(String[] args) throws InterruptedException {
        Animal tortuga = new Animal();
        Animal liebre = new Animal();
        liebre.setPriority(Thread.MAX_PRIORITY);
        tortuga.setPriority(Thread.MIN_PRIORITY);

        System.out.println("Comienza la carrera:");
        liebre.start();
        tortuga.start();

        Thread.sleep(3000);

        System.out.print("Liebre: ");
        liebre.interrupt();
        System.out.println("Tortuga: ");
        tortuga.interrupt();

        System.out.println("Fin de la carrera.");
    }
}
