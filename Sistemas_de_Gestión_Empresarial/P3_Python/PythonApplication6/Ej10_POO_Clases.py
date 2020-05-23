# -*- coding: utf-8 -*-
'''
8.2 PDO Comparación de clases
'''
# ------------------- COMPARACION DE CLASES -------------------


class Mueble:  # el primer parametro siempre self en todos
    def __init__(self, tipo):  # constructor, el destructor es __del(self)
        self.tipo = tipo  # realmente el quien determina la identidad de la propiedad es self.tipo

    def getTipo(self):
        return self.tipo

    def setTipo(self, tipo):  # metodo setter, a diferencia del constructor lo usaremos para cambiar valores de propiedades existentes
        self.tipo = tipo
    # referencia operaciones personalizacion de las clases
    # http://docs.python.org/2/reference/datamodel.html

    # aqui estamos asignando el comportamiento de la funcion comparacion dentro de la clase, si contamos esto, estara comparando el objeto y no su contenido.
    def __cmp__(self, other):
        if self.getTipo() < other.getTipo():
            return -1
        elif self.getTipo() == other.getTipo():
            return 0
        else:
            return 1

    def __str__(self):
        return "el objeto vale:"+str(self.tipo)

    def __len__(self):
        return self.tipo.__sizeof__()


muVal1 = Mueble(3)
muVal2 = Mueble(2)
muVal3 = Mueble(3)

if muVal1 == muVal2:
    print("iguales")
else:
    print("distintos")

if muVal1 == muVal3:  # Contienen el mismo valor?
    print("iguales")
else:
    print("distintos")

if muVal1 == muVal1:  # ojo, la misma variable
    print("iguales")
else:
    print("distintos")
