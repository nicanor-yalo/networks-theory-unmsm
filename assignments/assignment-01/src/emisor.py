import serial
import time

puerto_emisor = '/dev/ttyV1'
baudrate = 9600

try:
    with serial.Serial(puerto_emisor, baudrate, timeout=1) as ser:
        mensaje = "Hola desde el Emisor Python"
        print(f"📤 Enviando: '{mensaje}'")
        ser.write(f"{mensaje}\n".encode('utf-8'))
        time.sleep(0.1)
        print("✅ Mensaje enviado")
except serial.SerialException as e:
    print(f"❌ Error: {e}")
