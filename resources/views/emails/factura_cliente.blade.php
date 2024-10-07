<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
</head>
<body>
    <p>Hola {{ $cliente->nombre }},</p>
    <p>Adjunto encontrarás la factura número {{ $factura->numero }}.</p>
    <p>Gracias por tu compra.</p>
</body>
</html>