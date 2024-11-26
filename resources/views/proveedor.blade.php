<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/proveedor.css') }}">
    <title>Create Proveedor</title>
</head>
<body>

    <section>
        <a href="{{ route('home') }}">
            <h2>Create Product</h2>
        </a>
    </section>

    @if ($errors->any())
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="form-section">
        <form action="{{ route('createProveedors') }}" method="post">
            @csrf
            <input type="text" name="name" placeholder="Name Proveedor" value="{{ old('name') }}">
            <input type="text" name="direction" placeholder="Direction Proveedor" value="{{ old('direction') }}">
            <input type="text" name="phone" placeholder="Phone Proveedor" value="{{ old('phone') }}">
            <input type="email" name="email" placeholder="Email Proveedor" value="{{ old('email') }}">
            <input type="text" name="contact" placeholder="Contact Proveedor" value="{{ old('contact') }}">
            <textarea name="description" cols="30" rows="10">{{ old('description') }}</textarea>
            <input type="submit" value="Submit">
        </form>
    </section>

    <section class="table-section">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Description</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($proveedors as $proveedor)
                    <tr>
                        <td>{{ $proveedor->id }}</td>
                        <td>{{ $proveedor->name }}</td>
                        <td>{{ $proveedor->direction }}</td>
                        <td>{{ $proveedor->phone }}</td>
                        <td>{{ $proveedor->email }}</td>
                        <td>{{ $proveedor->contact }}</td>
                        <td>{{ $proveedor->description }}</td>
                        <td>
                            <a href="{{ route('editProveedor', $proveedor->id) }}">Edit</a>
                        </td>
                        <td>
                            <a href="{{ route('deleteProveedor', $proveedor->id) }}" onclick="return confirm('Are you sure you want to delete this supplier?')">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="text-align: center;">No suppliers registered</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>

</body>
</html>
