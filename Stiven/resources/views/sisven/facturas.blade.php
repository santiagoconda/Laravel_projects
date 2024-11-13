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
                    <th class="px-4 py-2 text-sm font-medium text-gray-700">Acciones</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    
    </div>
</x-app-layout>
