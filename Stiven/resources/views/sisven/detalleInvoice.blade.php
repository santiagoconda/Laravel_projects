<x-app-layout>
    <div class="container mx-auto p-6">
        <!-- Título de la factura -->
        <h1 class="text-4xl font-semibold text-gray-800 mb-6 text-center">Detalle de la Factura</h1>

        <div class="bg-white shadow-xl rounded-lg overflow-hidden border border-gray-200">

            <!-- Información de la factura -->
            <div class="bg-gray-100 p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-gray-800">Factura numero: ABC00{{ $invoice->number }}</h2>
                    <p class="text-sm text-gray-600">Fecha: {{ \Carbon\Carbon::parse($invoice->date)->format('d-m-Y') }}</p>
                </div>
            </div>

            <!-- Información del cliente -->
            <div class="p-6 space-y-4">
                <div class="grid grid-cols-2 gap-4 text-gray-600">
                    <div>
                        <p><strong>Nombre:</strong> {{ $invoice->customer->first_name }} {{ $invoice->customer->last_name }}</p>
                        <p><strong>Correo:</strong> {{ $invoice->customer->email }}</p>
                        <p><strong>Nuip:</strong> {{ $invoice->customer->document_number }}</p>
                    </div>
                    <div>
                        <p><strong>Teléfono:</strong> {{ $invoice->customer->phone_number }}</p>
                        <p><strong>Dirección:</strong> {{ $invoice->customer->andress }}</p>
                        <p><strong>Fecha:</strong> {{ $invoice->date}}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <p><strong>Metodo de pago:</strong> {{ $invoice->pay_mode->name }}</p>
                </div>
            </div>

            <!-- Detalles del Producto -->
            <div class="p-6 bg-gray-50">
                <h3 class="text-xl font-semibold text-gray-700 border-b border-gray-300 pb-2">Detalles del Producto</h3>
                <table class="min-w-full bg-white border border-gray-200 mt-4">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2 text-left text-gray-600">Producto</th>
                            <th class="px-4 py-2 text-left text-gray-600">Cantidad</th>
                            <th class="px-4 py-2 text-left text-gray-600">Precio Unitario</th>
                            <th class="px-4 py-2 text-left text-gray-600">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $detail)

                        <tr>
                            <td class="px-4 py-2 text-gray-600">{{ $detail->product->name }}</td>
                            <td class="px-4 py-2 text-gray-600">{{ $detail->quantity }}</td>
                            <td class="px-4 py-2 text-gray-600">${{ number_format($detail->price, 2, '.', ',') }}</td>
                            <td class="px-4 py-2 text-gray-600">${{ number_format($detail->quantity * $detail->price, 2, '.', ',') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-6 bg-gray-50 border-t border-gray-300">
                <div class="flex justify-between items-center">
                    <h4 class="text-lg font-semibold text-gray-800">Total:</h4>
                    <p class="text-2xl font-bold text-gray-800">${{ number_format($total, 2, '.', ',') }}</p>
                </div>
            </div>
            <div class="p-6 bg-gray-50 text-center space-x-4">
                <button onclick="window.print()" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Imprimir 
                </button>
                <form action="{{ route('detail.create') }}" method="GET" class="inline-block mt-4">
                    <button type="submit" class="text-white bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Nuevo producto
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
