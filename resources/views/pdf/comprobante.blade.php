<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #333; color: white; }
        .total { font-weight: bold; font-size: 1.4em; margin-top: 20px; color: #d9534f; }
    </style>
</head>
<body>
    <h1>Comprobante de Compra - TatamiHUB</h1>
    <p>Fecha de emisión: {{ date('d/m/Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                {{-- Si es array usa ['key'], si es objeto usa ->property --}}
                <td>{{ is_array($item) ? $item['producto']['nombre'] : $item->producto->nombre }}</td>
                <td>{{ is_array($item) ? $item['cantidad'] : $item->cantidad }}</td>
                <td>$ {{ number_format(is_array($item) ? $item['subtotal'] : $item->subtotal, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p class="total">Total pagado: $ {{ number_format($total, 2) }}</p>
</body>
</html>
