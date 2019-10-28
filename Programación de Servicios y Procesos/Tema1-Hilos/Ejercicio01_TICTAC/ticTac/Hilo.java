package ticTac;

public class Hilo extends Thread{
    String palabra;
    public Hilo(String palabra){
        this.palabra = palabra;
    }

    @Override
    public void run() {
        try {
            for (int i = 0; i < 60; i++) {
                System.out.println(palabra);
                Thread.sleep(1000);
            }
        } catch(Exception e) {
            System.out.println(e);
        }
    }
}
