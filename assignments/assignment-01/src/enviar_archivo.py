import serial
import sys
import os

archivo = sys.argv[1]
puerto = sys.argv[2]

# Si el archivo no existe, crearlo
if not os.path.exists(archivo):
    print(f"⚠️ El archivo {archivo} no existe. Creándolo...")
    with open(archivo, 'w') as f:
        f.write("Este es un archivo de prueba enviado por puerto serial\n")
        for i in range(5):
            f.write(f"Línea {i+1} del archivo de prueba\n")

with open(archivo, 'r') as f:
    contenido = f.read()

with serial.Serial(puerto, 9600, timeout=3) as ser:
    ser.write(contenido.encode())
    print(f"📄 Archivo {archivo} enviado ({len(contenido)} bytes)")
