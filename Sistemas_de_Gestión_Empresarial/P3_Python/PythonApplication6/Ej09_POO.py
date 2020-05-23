# -*- coding: utf-8 -*-
'''
8 PDO
'''


class Mueble:  # el primer registro siempre self en todos
    def __init__(self, tipo):  # constructor
        self.tipo = tipo  # Propiedad publica

    def getTipo(self):  # Metodo getter
        return self.tipo

    def setTipo(self, tipo):
        self.tipo = tipo


# Llamamos al constructor pero no usamos self en ningun momento a llamar
mu = Mueble(3)
print("Mueble(3)")
print("El tipo es (metodo): ", mu.getTipo())
print("El tipo es (propiedad):", mu.tipo)

print(" # HERENCIA")


class Mesa(Mueble):  # metemos las clases padre dentro de parentesis y separadas por comas,
    def __init__(self, tipo, color):
        # Llamamos al padre para inicalizar, tipo proviene de padre, con lo cual no lo tengo declarado desde mi metodo self.color = color # Nuestra propiedad, si pertenece a Mesa
        Mueble.__init__(self, tipo)
        self.color = color  # nuestra propiedad si pertenece a la mesa

    def getColor(self):  # nuestros metodos
        return self.color

    def setColor(self, color):
        self.color = color


ms = Mesa(5, 7)
print("Mesa(5,7)")
print("El tipo es: ", ms.getTipo())  # metodo del padre
print("El color es: ", ms.getColor())  # metodo mio

print("# sobreescritura de metodos")


class Mesa2(Mueble):
    def __init__(self, tipo, color):
        Mueble.__init__(self, tipo)
        self.color = color

    def getColor(self):
        return self.color

    def setColor(self, color):
        self.color = color

    def getTipo(self):  # Sobre escribimos al padre, como existe en nuestra clase usara nuestro metodo en lugar del del padre
        return self.tipo + 1


ms2 = Mesa2(5, 7)
print("Mesa2(5,7)")
print("El tipo es: ", ms2.getTipo())
print("EL color es: ", ms2.getColor())

print("#no existe nada privado")


class UnaPrivada:
    def __init__(self):
        self.__Privada = 1  # Supuesta variable privada
        self.Publica = 2


pr = UnaPrivada()
print("Publica; ", pr.Publica)

# Pese a ser privada podemos accedder a ella, es obligatorio el primer_, es obligatorio que la variable privada tenga dos __, sino el analizador sintactiva va a cantar
print("Privada: ", pr._UnaPrivada__Privada)

# Propiedades


class Propiedades:
    def __init__(self, dia):
        self.__d = dia  # propiedad __d que almacenara el valor privado
        self.diaPublica = dia

    def __getDia(self):
        return self.__d

    def __getDiaPublico(self):
        return self.diaPublica

    def __setDia(self, dia):
        self.__d = dia
        self.diaPublica = dia
    dia = property(__getDia, __setDia)  # Propiedad dia creada
    # Propiedad diaPublica creada
    diaPublico = property(__getDiaPublico, __setDia)
    # redundante, ya hemos creado como publica en el constructor self.diaPublica = dia, pero para ver
    # que es posible de ambas formas


d = Propiedades(3)
print("Dia antes", d.dia)
print("Dia Publica", d.diaPublica)  # desde constructor
print("Dia Publico", d.diaPublico)  # desde property
d.dia = 7

print("Dia Despues", d.dia)  # nueva propiedad
