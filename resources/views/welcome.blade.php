<!DOCTYPE html>
<html>
<head>
    <title>Ejemplo con Mercado Pago</title>
</head>
<body>
<h1>Comprar producto de ejemplo</h1>
<form method="POST" action="/pagar">
    @csrf
    <button type="submit">Pagar $100</button>
</form>
</body>
</html>
