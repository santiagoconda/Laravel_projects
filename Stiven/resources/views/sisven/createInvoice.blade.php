<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Facturas') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-lg overflow-hidden">
                <div class="p-8 space-y-6">
    
                    <form action="{{ route('invoice.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="form-group">
                            <label for="number" class="block text-sm font-medium text-gray-700">Número de factura</label>
                            <input type="number" name="number" id="number" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="customer_id" class="block text-sm font-medium text-gray-700">Cliente</label>
                            <select name="customer_id" id="customer_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->first_name }}</option>
                                @endforeach
                            </select>
                        </div>
                            <div class="form-group">
                            <label for="date" class="block text-sm font-medium text-gray-700">Fecha</label>
                            <input type="date" name="date" id="date" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="_pay_mode_id" class="block text-sm font-medium text-gray-700">Método de Pago</label>
                            <select name="_pay_mode_id" id="_pay_mode_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                @foreach($payModes as $payMode)
                                    <option value="{{ $payMode->id }}">{{ $payMode->name }}</option>
                                @endforeach
                            </select>
                        </div>
                           
                        <button type="submit" class="w-full py-3 px-4 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Crear Producto
                        </button>
                    </form>
    
                </div>
            </div>
        </div>
    </div>
    

</x-app-layout>
