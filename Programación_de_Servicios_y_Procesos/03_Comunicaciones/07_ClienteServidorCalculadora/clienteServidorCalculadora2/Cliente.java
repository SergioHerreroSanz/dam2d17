package clienteServidorCalculadora2;

import java.io.IOException;

public class Cliente {
    public static void main(String[] args) throws IOException {
        int num1 = 2;
        int num2 = 3;
        String operacion = AccionesCliente.SUMA;

        System.out.println(AccionesCliente.calcular(num1, num2, operacion));
    }
}
