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
                    <div class="mb-4 rounded bg-green-100 px-4 py-2 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('productos.create') }}" class="inline-block rounded bg-blue-600 px-4 py-2 text-white">
                    Crear producto
                </a>

                <div class="mt-6 overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300 text-sm">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-3 py-2">Código</th>
                                <th class="border border-gray-300 px-3 py-2">Nombre</th>
                                <th class="border border-gray-300 px-3 py-2">Precio</th>
                                <th class="border border-gray-300 px-3 py-2">Cantidad</th>
                                <th class="border border-gray-300 px-3 py-2">Categoría</th>
                                <th class="border border-gray-300 px-3 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($productos as $producto)
                                <tr>
                                    <td class="border border-gray-300 px-3 py-2">{{ $producto->codigo }}</td>
                                    <td class="border border-gray-300 px-3 py-2">{{ $producto->nombre }}</td>
                                    <td class="border border-gray-300 px-3 py-2">{{ number_format($producto->precio, 2) }}</td>
                                    <td class="border border-gray-300 px-3 py-2">{{ $producto->cantidad }}</td>
                                    <td class="border border-gray-300 px-3 py-2">{{ $producto->categoria }}</td>
                                    <td class="border border-gray-300 px-3 py-2">
                                        <a href="{{ route('productos.edit', $producto) }}" class="text-blue-600">Editar</a>

                                        <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ml-2 text-red-600" onclick="return confirm('¿Desea eliminar este producto?')">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="border border-gray-300 px-3 py-4 text-center">
                                        No hay productos registrados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
