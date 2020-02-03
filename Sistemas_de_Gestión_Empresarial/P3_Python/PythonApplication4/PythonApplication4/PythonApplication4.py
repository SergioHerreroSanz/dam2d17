
#--coding: utf-8 -*-
if __name__ == "__main__":
    #Definicion
    dVal1 = {"key1": "valorl", "key2": "valor2",}

    print ("Diccionario: ", dVal1)
    print ("Diccionario valor con clave key2 dKey['Key2']: ", dVal1['key2'])

    # Se puede usar cualquier tipo de valor, y en las claves tipos básicos
    dVal2 = {1:"Valor cadena", "keyABC":23}
    print ("Diccionario: ",dVal2)
    print ("Diccionario valor con clays 1 d[1]: ",dVal2[1])
    print ("Diccionario valor con clave keyABC d['keyABC']: ",dVal2['keyABC'])

    # Es dinAmico pero sin ciaves duplicadas
    dVal2[2] = 6 + 7j
    print ("Diccionario a añadir: ", dVal2)
    dVal2[2] = "ABC"
    print ("Diccionario a modificar: ", dVal2)
    #del dVal2[1] = "ABC"
    #print "Diccionario borrar: ", dVal2