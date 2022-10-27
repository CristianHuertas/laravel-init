<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Dispositivo: {{ $device->name }} <strong>Actualizado</strong></h1>

    <P>Se ha actualizado un dispositivo</P>
    <P>Descripcion del dispositivo: {{ $device->description }}</P>
    <P>Actualizado con fecha: {{ $device->updated_at }}</P>

</body>

</html>
