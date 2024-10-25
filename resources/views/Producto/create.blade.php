<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('productos.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block mb-2">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="border w-full p-2 rounded" placeholder="Nombre" value="{{ old('nombre')}}">
                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="precio" class="block mb-2">Precio</label>
                <input type="number" id="precio" name="precio" class="border w-full p-2 rounded" placeholder="Precio" value="{{ old('precio')}}">
                @error('precio')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="id_categoria" class="block mb-2">Categoría</label>
                <select id="id_categoria" name="id_categoria" class="border w-full p-2 rounded" value="{{ old('id_categoria')}}">
                    @foreach ($categorias as $categoria)
                        <option value="{{   $categoria->id  }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                @error('id_categoria')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Enviar</button>
        </form>
    </div>
</body>

</html>
