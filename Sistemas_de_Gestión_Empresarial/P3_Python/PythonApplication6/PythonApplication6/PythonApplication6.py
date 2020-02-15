#-*- coding: utf-8 -*-
import sys

#Definicion sin tipo al asignar, pero obligatorio asignar antes de usar
sVall = "Valor"
sVal2 = "Mi Cadena Larga \
en varias líneas"

print(sVall, "-----", sVal2) #Añade espacios la coma
print(sVall + "-----" + sVal2) #No añade espacios el concatenador
tTupla = (1,"ABC", True)
(v1,v2,v3) = tTupla
print("variables v1,v2,v3: ", v1, v2 ,v3)

#Cadenas de formato %d, %s, %f
iVal1 = 23
sVal2 = "Jose"

print("%s tiene %d años" % (sVal2,iVal1))
#Parametros
if (len(sys.argv) > 1):
    print("hay parametros y el primero es: ",sys.argv[1]) #En este caso sin espacio, es automatico
else:
    print("No hay parametros y el nombre es: ", sys.argv[0])
#Entrada de datos
nombre = input("Como te llamas?")
print("encantado, " + nombre) #Ver espacio
print("encantado, " + format(nombre.encode('iso-8859-15'))) #Encode es una función byte, por lo que debe ser pasada a función cadena

