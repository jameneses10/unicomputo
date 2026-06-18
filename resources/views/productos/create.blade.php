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
                    <div style="color: red;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <br>
                @endif

                <form action="{{ route('productos.store') }}" method="POST">
                    @csrf

                    <label>Código:</label><br>
                    <input type="text" name="codigo" value="{{ old('codigo') }}">
                    <br><br>

                    <label>Nombre:</label><br>
                    <input type="text" name="nombre" value="{{ old('nombre') }}">
                    <br><br>

                    <label>Precio:</label><br>
                    <input type="number" step="0.01" name="precio" value="{{ old('precio') }}">
                    <br><br>

                    <label>Cantidad:</label><br>
                    <input type="number" name="cantidad" value="{{ old('cantidad') }}">
                    <br><br>

                    <label>Categoría:</label><br>
                    <input type="text" name="categoria" value="{{ old('categoria') }}">
                    <br><br>

                    <button type="submit"
                            style="background: #16a34a; color: white; padding: 8px 12px; border-radius: 5px;">
                        Guardar
                    </button>

                    <a href="{{ route('productos.index') }}">Volver</a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>