<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Listado de Productos
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                @if(session('success'))
                    <div style="color: green; margin-bottom: 15px;">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('productos.create') }}"
                   style="background: #2563eb; color: white; padding: 8px 12px; border-radius: 5px; text-decoration: none;">
                    Crear producto
                </a>

                <br><br>

                <table border="1" cellpadding="10" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Categoría</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($productos as $producto)
                            <tr>
                                <td>{{ $producto->codigo }}</td>
                                <td>{{ $producto->nombre }}</td>
                                <td>{{ $producto->precio }}</td>
                                <td>{{ $producto->cantidad }}</td>
                                <td>{{ $producto->categoria }}</td>
                                <td>
                                    <a href="{{ route('productos.edit', $producto) }}">Editar</a>

                                    <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" onclick="return confirm('¿Desea eliminar este producto?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" align="center">No hay productos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>