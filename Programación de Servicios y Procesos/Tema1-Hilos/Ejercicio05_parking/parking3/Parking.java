package parking3;

import java.util.ArrayList;

public class Parking {
    public static int[] aparcado;
    public static ArrayList<Integer> esperando;
    private String prevCadena = "";

    public Parking(int plazas) {
        this.aparcado = new int[plazas];
        esperando = new ArrayList<Integer>();
    }

    public synchronized boolean aparcar(int id) {
        for (int i = 0; i < aparcado.length; i++) {
            if (aparcado[i] == 0) {
                aparcado[i] = id;
                if (esperando.contains(id)) {
                    esperando.remove(esperando.indexOf(id));
                }
                imprimir();
                //aparcado
                return true;
            }
        }
        //esperando
        try {
            if (!esperando.contains(id)) {
                esperando.add(id);
            }
            imprimir();
            wait();
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
        return false;
    }

    public synchronized void liberarPlaza(int id) {
        for (int i = 0; i < aparcado.length; i++) {
            if (aparcado[i] == id) {
                aparcado[i] = 0;
                imprimir();
                notifyAll();
                return;
            }
        }
        //libre
    }

    public void imprimir() {
        String cadena = "";
        for (int i = 0; i < aparcado.length; i++) {
            if (aparcado[i] == 0) {
                cadena += "[ ]";
            } else {
                cadena += "[" + aparcado[i] + "]";
            }
        }
        cadena += " ";
        for (int coche : esperando) {
            cadena += "(" + coche + ")";
        }
        if (!cadena.equals(prevCadena)) {
            System.out.println(cadena);
        }
        prevCadena = cadena;
    }
}

