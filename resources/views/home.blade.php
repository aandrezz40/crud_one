<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Registrar Producto</h2>

    <!-- Formulario -->
    <article>
        <a href="{{ route('proveedor') }}">
            <section>
                <h2>Register provider</h2>
            </section>
        </a>
        <a href="">
            <section>
                <h2>Register category </h2>
            </section>
        </a>
    </article>
    
    <form action="{{route('createProducts')}}" method="POST">
        @csrf
        <div class="mb-3">
            <input type="text" name="producto" placeholder="Producto" class="form-control" required>
        </div>
        <div class="mb-3">
            <input type="number" name="precio" placeholder="Precio" class="form-control" required>
        </div>
        <div class="mb-3">
            <input type="number" name="stock" placeholder="Stock" class="form-control" required>
        </div>
        <select name="" id="">
            @foreach ($categorys as $category)
                <option value="{{$category->id}}" disabled>{{$category->name}}</option>
                
            @endforeach
        </select>
        <select name="" id="">
            @foreach ($providers as $provider)
                <option value="{{$provider->id}}" disabled>{{$provider->name}}</option>
                
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <hr>

    <!-- Tabla -->
    <h2>Productos Registrados</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>price</th>
                <th>Stock</th>
                <th>create data</th>
                <th colspan="2">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->stock}}</td>
                    <td>{{$product->created_at->format('Y-m-d H:i:s')}}</td>
                    <td>
                        <a href="{{route('editProduct', $product->id)}}">Edit</a>
                    </td>
                    <td>
                        <a href="{{route('deleteProduct', $product->id)}}">Delete</a>
                    </td>
                </tr>
                
            @endforeach
            <tr>
                <td colspan="4" class="text-center">No hay productos registrados.</td>
            </tr>

        </tbody>
    </table>
</div>
</body>
</html>