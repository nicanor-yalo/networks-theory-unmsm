import serial
import sys

puerto = sys.argv[1]
archivo_salida = sys.argv[2]

with serial.Serial(puerto, 9600, timeout=5) as ser:
    datos = ser.read(1024).decode()
    with open(archivo_salida, 'w') as f:
        f.write(datos)
    print(f"📄 Archivo recibido: {archivo_salida}")
