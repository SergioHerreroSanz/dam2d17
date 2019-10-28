package prioridades;

public class Animal extends Thread {
    @Override
    public void run() {
        int i = 0;

        while(!isInterrupted()){
            i++;
        }

        System.out.println(i);
    }
}
