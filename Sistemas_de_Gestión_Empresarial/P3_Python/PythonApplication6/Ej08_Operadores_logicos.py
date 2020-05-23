# -*- coding: utf-8 -*-
'''
'''
print(" uso de and y or")
print("ABC" and ())
print("ABC" and [])
print("ABC" and '')
print("ABC" and False)
print("ABC" and None)
print(True and False)

print("ABC" or 0)
print("ABC" or {})
print("ABC" or [])
print("ABC" or '')
print("ABC" or False)
print("ABC" or None)
print("qqq" or True)

print(" and y or cortocircuito")


def miFunc(p):
    print(p)


# La función no se ejecuta al ser falsa la expresión en el primer operando
False and miFunc("valor and")
# La función se ejecuta al ser verdadera la expresión en el segundo operando
False or miFunc("valor or")

print(" operador =:")
sOp1 = "a"
sOp2 = "b"
iVal = 5
print(iVal == 5 and sOp1 or sOp2)
print(iVal != 5 and sOp1 or sOp2)

print("funciones en línea (lambda)")
# función de un parámetro x, que se multiplica por tres (x*3), en este caso 18*(6)
print((lambda x: x*3)(6))
print(None or "ca")
