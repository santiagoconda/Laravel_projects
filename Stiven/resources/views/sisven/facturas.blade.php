<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-4">Listado de Facturas</h1>
    
        <!-- Tabla con datos de facturas -->
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-4 py-2 text-sm font-medium text-gray-700">Factura #</th>
                    <th class="px-4 py-2 text-sm font-medium text-gray-700">Fecha</th>
                    <th class="px-4 py-2 text-sm font-medium text-gray-700">Cliente</th>
                    <th class="px-4 py-2 text-sm font-medium text-gray-700" colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($invoice as $inv)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm">{{ $inv->number }}</td>
                        <td class="px-4 py-2 text-sm">{{ $inv->date }}</td>
                        <td class="px-4 py-2 text-sm">{{ $inv->customer->first_name }} {{ $inv->customer->last_name }}</td>
                        <td class="px-4 py-2 text-sm">
                            <a href="{{ route('invoice.show', $inv->id) }}" class="text-blue-500 hover:underline">Ver Detalle</a>
                        </td>
                        <td>
                            <form action="{{ route('invoice.destroy', ['id' => $inv->id]) }}" method="POST" class="inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800  font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" title="Eliminar Producto">
                                    <i class="fas fa-trash-alt mr-2"></i> Eliminar
                                </button>
                            </form>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
    </div>
</x-app-layout>
