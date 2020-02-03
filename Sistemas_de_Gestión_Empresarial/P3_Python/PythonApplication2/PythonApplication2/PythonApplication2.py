print("hola mundo")
sCadena = "h{0}la mundo"

nSimple = 3
enteroLargo = 3 # Ya no hay entero largo, solo entero
numeroOctal = 0o77
numeroHexadecimal = 0XF1
comaFlotante = 23.45
numeroComplejo = 2 + 3.0j
notacionCientifica = 20.2e-2
prueba = 25,26

print("nSimple: ",	nSimple)
print("enteroLargo: ", enteroLargo)
print("numeroOctal: ", numeroOctal)
print("numeroHexadecimal: ", numeroHexadecimal)
print("comaFlotante: ", comaFlotante)
print("numeroComplejo: ", numeroComplejo)
print("notacionCientifica: ", notacionCientifica)
print("prueba: ", prueba)
print(sCadena)
print(sCadena.format("A",230.33))

cad = "cadena"
print((cad+"\n") * 3)