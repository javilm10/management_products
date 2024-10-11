<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Enlaza tu CSS personalizado -->
    <title>Gestión de Productos</title>
    <style>
        body {
            background: url('https://source.unsplash.com/random/1920x1080') no-repeat center center fixed;
            background-size: cover;
            color: #fff; /* Cambia el color del texto */
        }
        .table {
            background: rgba(255, 255, 255, 0.8); /* Fondo blanco semi-transparente para la tabla */
            border-radius: 5px; /* Bordes redondeados */
        }
        .container {
            margin-top: 50px;
            background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%); /* Fondo negro semi-transparente para la contenedor */
            border-radius: 10px; /* Bordes redondeados */
            padding: 20px; /* Espaciado interior */
        }
        .btn {
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #007bff; /* Color al pasar el ratón */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Gestión de Productos</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Añadir Producto</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
