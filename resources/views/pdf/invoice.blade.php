<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="bg-secondary rounded p-2">
    <h3>Información sobre el pedido</h3>
</div>

<hr>
<h5>Datos sobre el cliente:</h5>
<ul>
    <li>
        <strong>Nombre:</strong>
        {{ $user->name }}
    </li>
    <li>
        <strong>E-mail</strong>
        {{ $user->email }}
    </li>
    <li>
        <strong>Teléfono</strong>
        {{ $user->phone }}
    </li>
    <li>
        <strong>Dirección</strong>
        {{ $user->address }}
    </li>
</ul>
<p><strong>Fecha del pedido:</strong>
    {{ $cart->order_date->format('d-m-Y h:i:s A') }}
</p>
<hr>
<div class="p-2 border border-info rounded">
    <p>Detalles del pedido</p>
    <ul>
        @foreach($cart->details as $detail)
            <li>
                {{ $detail->product->name }} x {{ $detail->quantity }}
                ({{ $detail->quantity * $detail->product->price }}€)
            </li>
        @endforeach
    </ul>
</div>
<br><br>
<div class="p-2 border border-warning rounded">
    <p>
        <strong>Importe a pagar: </strong>{{ $cart->total }}€
    </p>
</div>
<hr>
</body>
</html>
