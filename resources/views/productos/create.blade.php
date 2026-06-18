<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Producto
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                @if ($errors->any())
                    <div class="mb-4 rounded bg-red-100 px-4 py-2 text-red-700">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('productos.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label>Código:</label>
                        <input class="block w-full rounded border-gray-300" type="text" name="codigo" value="{{ old('codigo') }}" required>
                    </div>

                    <div>
                        <label>Nombre:</label>
                        <input class="block w-full rounded border-gray-300" type="text" name="nombre" value="{{ old('nombre') }}" required>
                    </div>

                    <div>
                        <label>Precio:</label>
                        <input class="block w-full rounded border-gray-300" type="number" step="0.01" name="precio" value="{{ old('precio') }}" required>
                    </div>

                    <div>
                        <label>Cantidad:</label>
                        <input class="block w-full rounded border-gray-300" type="number" name="cantidad" value="{{ old('cantidad') }}" required>
                    </div>

                    <div>
                        <label>Categoría:</label>
                        <input class="block w-full rounded border-gray-300" type="text" name="categoria" value="{{ old('categoria') }}" required>
                    </div>

                    <div>
                        <button type="submit" class="rounded bg-green-600 px-4 py-2 text-white">Guardar</button>
                        <a href="{{ route('productos.index') }}" class="ml-3 text-blue-600">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
