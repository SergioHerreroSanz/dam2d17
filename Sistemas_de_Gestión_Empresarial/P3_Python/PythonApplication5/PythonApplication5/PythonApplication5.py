#-*- coding: utf-8 -*-

#Definición
tVal1 = ("valor", 2, 2 + 4j)
print("Tupla: ", tVal1)
print("Tupla valor con índice 2: ", tVal1[2])
#No es dinámico
#Se pueden conseguir partes
print("Desde el final índice negativo", tVal1[-2])# -1 es el ultimo
print("Una parte: ", tVal1[1:])
print("Una parte: ", tVal1[1:2]) # inicio incluido, indice fin excluido

#Operadores +,+=,*
print("Dos tuplas: ", tVal1 + tVal1)
print("Una tupla tres veces: : ", tVal1 * 3)

#Funciones básicas
print("---Funciones básicas")
print(tVal1)
print(len(tVal1))
print(tVal1.index(2 + 4j))
print(3 in tVal1) #Quién es 3 en la tupla?
print(2 in tVal1) #Quién es 2 en la tupla?
#Mapeo de tuplas ejecutar una acción sobre los todos los elementos
print("map")
tVal2 = (1, 2, 3, 4, 5)
print(tVal2)
print("Todo por dos ", tuple([ele * 2 for ele in tVal2])) #Generamos una tupla desde una lista con tuple , al revés list
print("Impares por dos ", tuple([ele * 2 for ele in tVal2 if ele % 2 != 0]))
(v1, v2, v3) = ("cade", 1, 2)
print(v1)
print(v2)
print(v3)
