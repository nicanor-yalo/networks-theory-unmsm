<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Evaluación - Grupo 18</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <header class="header">
        <h1>UNMSM | Grupo 18</h1>
        <a href="index.html" class="btn-volver">Volver al Inicio</a>
    </header>

    <div class="container" style="grid-template-columns: 1fr; max-width: 700px;">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = htmlspecialchars($_POST['nombre']);
            $peso = floatval($_POST['peso']);
            $altura = floatval($_POST['altura']);

            if ($peso > 0 && $altura > 0) {
                $imc = $peso / ($altura * $altura);
                $imc_redondeado = round($imc, 1);

                if ($imc < 18.5) {
                    $categoria = "Bajo peso";
                    $clase = "bg-bajo";
                    $analisis = "Tu peso está por debajo de lo recomendado. Considera aumentar tu ingesta calórica de forma saludable.";
                } elseif ($imc >= 18.5 && $imc <= 24.9) {
                    $categoria = "Peso Normal";
                    $clase = "bg-normal";
                    $analisis = "¡Excelente! Tu peso se encuentra en el rango saludable. Mantén tus hábitos actuales.";
                } elseif ($imc >= 25 && $imc <= 29.9) {
                    $categoria = "Sobrepeso";
                    $clase = "bg-sobrepeso";
                    $analisis = "Tienes un ligero exceso de peso. Se recomienda incrementar la actividad física.";
                } else {
                    $categoria = "Obesidad";
                    $clase = "bg-obesidad";
                    $analisis = "Tu peso representa un riesgo para la salud. Es aconsejable buscar asesoría médica y nutricional.";
                }

                echo "
                <div class='card resultado-hero'>
                    <p style='text-transform: uppercase; letter-spacing: 2px; color: #64748B; font-size: 0.85rem;'>Evaluación de</p>
                    <h2 style='color: var(--guinda); font-size: 1.8rem; margin-bottom: 20px;'>$nombre</h2>
                    
                    <p style='color: #64748B; font-size: 0.9rem;'>Índice de Masa Corporal</p>
                    <div class='imc-numero'>$imc_redondeado</div>
                    
                    <div class='badge $clase'>$categoria</div>

                    <div class='caja-analisis'>
                        <p><strong>Análisis:</strong> $analisis</p>
                        <p style='margin-top: 15px; font-size: 0.9rem; color: #475569;'>
                            <strong>Datos registrados:</strong> Peso: {$peso} kg | Altura: {$altura} m
                        </p>
                    </div>

                    <a href='index.html' class='btn-regresar'>Realizar nueva evaluación</a>
                </div>
                ";
            } else {
                echo "<div class='card'><h2 style='color: var(--rojo);'>Error en los datos</h2><p>Los valores ingresados no son válidos. Intente nuevamente.</p><a href='index.html' class='btn-regresar'>Volver al formulario</a></div>";
            }
        } else {
            echo "<div class='card'><h2 style='color: var(--rojo);'>Acceso Restringido</h2><p>Debe completar el formulario para ver esta página.</p><a href='index.html' class='btn-regresar'>Ir al formulario</a></div>";
        }
        ?>
    </div>

</body>
</html>