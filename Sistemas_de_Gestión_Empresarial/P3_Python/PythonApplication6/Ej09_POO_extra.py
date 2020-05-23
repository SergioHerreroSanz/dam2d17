# Uso de las propiedades en escenarios que los atributos internos deban ser modificados
class Propiedades2:
    def __init__(self, attInterno):
        self.MiAtributo = attInterno
    @property
    def MiAtributo(self):
        return self.__MiAtributo
    @MiAtributo.setter
    def MiAtributo(self, val):
        if val < 0:
            self.__MiAtributo = 0
        elif val > 50:
            self.__MiAtributo = 50
        else:
            self.__MiAtributo = val

x = Propiedades2(-10)
print ("Valor fuera de rango por defecto(-10):", x.MiAtributo)
x = Propiedades2(20)
print("Valor en rango(20):", x.MiAtributo)
x = Propiedades2(200)
print ("Valor fuera de rango por exceso(200):", x.MiAtributo)
