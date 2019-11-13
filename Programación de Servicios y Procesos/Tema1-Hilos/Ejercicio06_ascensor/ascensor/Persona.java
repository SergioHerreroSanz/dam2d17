package ascensor;

public class Persona implements Runnable {
    public final static String[] nombres = {"Neville", "Lawrence", "Allen", "Guinevere", "Beatrice", "Candace", "Jesse", "Gregory", "William", "Sylvester", "Hop", "Brody", "Colleen", "Davis", "Haviva", "Vincent", "Norman", "Plato", "Robert", "Ivan", "Florence", "Andrew", "Brandon", "Renee", "Xena", "Baker", "Laith", "Coby", "Phelan", "Joy", "Paloma", "Lev", "Dorothy", "Sara", "Lee", "Berk", "Lionel", "Bernard", "Xander", "Fletcher", "Genevieve", "Jolie", "Erin", "Ivan", "Cooper", "Jaime", "Sydnee", "Yvette", "Bruno", "Colby", "Baxter", "Colton", "Julie", "Aidan", "Derek", "Jaden", "Jermaine", "Merrill", "Gage", "Miriam", "Elmo", "Genevieve", "Hasad", "Catherine", "Magee", "Grace", "Tarik", "Latifah", "Evan", "Brett", "Vaughan", "Dillon", "Tanek", "Lenore", "Cole", "Ifeoma", "Raymond", "Nerea", "Ryan", "Odysseus", "Caesar", "Desiree", "Virginia", "Randall", "Igor", "Armando", "Chadwick", "Ross", "Lavinia", "Ulla", "Nash", "Amena", "Reagan", "Hammett", "Naomi", "Alexis", "Alyssa", "Lester", "Miriam", "Ann"};
    private String nombre;
    private int peso;

    public Persona(String nombre, int peso) {
        this.nombre = nombre;
        this.peso = peso;
    }

    @Override
    public void run() {
        boolean subido = false;
        while (!subido) {
            subido = Main.ascensor.subirAscensor(nombre, peso);
        }
        try {
            Thread.sleep(2000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
        Main.ascensor.bajarAscensor(nombre, peso);
    }

}
