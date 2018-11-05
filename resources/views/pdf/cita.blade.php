<!DOCTYPE html>
<html lang="es">
<body>
    <div class="text-center" style="text-align:center">
        <img src="https://telemedicinadetampico.files.wordpress.com/2013/01/secretaria-de-salud-logo.jpg" style="margin-bottom: 2em;width: 40%" alt="">
        <h2>SERVICIOS DE SALUD DE OAXACA</h2>
        <h1>TARJETA <br>DE <br>CITAS</h1>
        <h4>UNIDAD: {{ $evento->medico->profile->especialidad['name'] }}</h4>
        <h4>NOMBRE: {{ $evento->cliente['name'] }}</h4>
        <h4>FECHA: {{ $evento->start }}</h4>
    </div>
</body>
</html>