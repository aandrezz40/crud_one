<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/proveedor.css') }}">
    <title>Create Category</title>
</head>
<body>

    <section>
        <a href="{{ route('home') }}">
            <h2>Create Product</h2>
        </a>
    </section>

    <form action="{{ route('createCategory') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Name Category" value="{{ old('name') }}">
        <textarea name="description" cols="30" rows="10">{{ old('description') }}</textarea>
        <input type="submit" value="Create Category">
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categorys as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ route('editCategory', $category->id) }}">Edit</a>
                    </td>
                    <td>
                        <a href="{{ route('deleteCategory', $category->id) }}" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">No categories registered</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
