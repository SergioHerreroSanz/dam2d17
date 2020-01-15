package parking;

import java.util.ArrayList;

public class Parking {
    private int plazas;

    public Parking(int plazas) {
        this.plazas = plazas;
    }

    public synchronized boolean aparcar() {
        if (plazas>0) {
            plazas--;
            System.out.println("Coche aparcado");
            return true;
        } else {
            System.out.println("Esperando");
            return false;
        }
    }

    public void liberarPlaza() {
        plazas++;
        System.out.println("Plaza libre");
    }
}

