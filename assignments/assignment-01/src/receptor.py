import serial

puerto_receptor = '/dev/ttyV0'
baudrate = 9600

try:
    with serial.Serial(puerto_receptor, baudrate, timeout=8) as ser:
        print(f"📥 Esperando mensaje en {puerto_receptor}...")
        mensaje = ser.readline().decode('utf-8').strip()
        if mensaje:
            print(f"✅ Recibido: '{mensaje}'")
        else:
            print("⏰ No se recibió nada")
except serial.SerialException as e:
    print(f"❌ Error: {e}")
