<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Detalle de la Factura</h1>
        
        <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200">
            
            <div class="bg-gray-100 p-6">
                <h2 class="text-xl font-bold text-gray-800">Factura #{{ $invoice->number }}</h2>
                <p class="text-sm text-gray-600">Fecha: {{ \Carbon\Carbon::parse($invoice->date)->format('d-m-Y') }}</p>
            </div>

            <div class="p-6 space-y-4">
                <div>
                    <h3 class="text-lg font-medium text-gray-700">Cliente</h3>
                    <p><strong>Nombre:</strong> {{ $invoice->customer->first_name }} {{ $invoice->customer->last_name }}</p>
                    <p><strong>Correo:</strong> {{ $invoice->customer->email }}</p>
                    <p><strong>Teléfono:</strong> {{ $invoice->customer->phone_number }}</p>
                    <p><strong>Dirección:</strong> {{ $invoice->customer->andress }}</p>
                    <p><strong>Metodo de pago:</strong> {{ $invoice->pay_mode->name }}</p>
                </div>
                
                <div>
                    <h3 class="text-lg font-medium text-gray-700">Detalles de la Factura</h3>
                    <p><strong>Total:</strong> ${{ number_format($invoice->total_amount, 2) }}</p>
                </div>
            </div>

            <div class="p-6 bg-gray-50 text-center">
                <button onclick="window.print()" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-200">
                    Imprimir Factura
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
