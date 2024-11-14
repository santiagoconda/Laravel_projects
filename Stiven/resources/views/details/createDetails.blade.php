<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Facturas') }}
        </h2>
    </x-slot>
    <div @yield('formulario') class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-lg overflow-hidden">
                <div class="p-8 space-y-6">
    
                    <form action="{{ route('detail.store') }}" method="POST" class="space-y-6">
                        @csrf
                      
                        <div class="form-group">
                            <label for="invoice_id" class="block text-sm font-medium text-gray-700">Numero de factura</label>
                            <select name="invoice_id" id="invoice_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                @foreach($invoices as $invoice)
                                    <option value="{{ $invoice->id }}">{{ $invoice->number }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_id" class="block text-sm font-medium text-gray-700">Nombre del producto</label>
                            <select name="product_id" id="product_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                        {{ $product->name }} ({{ number_format($product->price) }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Cantidad</label>
                            <input type="number" name="quantity" id="quantity" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <div class="form-group">
                            <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
                            <input type="text" name="price" id="price" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly required>
                        </div>
                            <button type="submit" class="w-full py-3 px-4 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                Guardar
                            </button>
                    </form>
    
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const productSelect = document.getElementById('product_id');
    const priceInput = document.getElementById('price');
    
    productSelect.addEventListener('change', function() {
        const selectedOption = productSelect.options[productSelect.selectedIndex];
        const price = selectedOption.getAttribute('data-price');
        
        const formattedPrice = `${parseFloat(price).toFixed(2).replace()}`;
        priceInput.value = formattedPrice; 
    });

    if (productSelect.value) {
        const selectedOption = productSelect.options[productSelect.selectedIndex];
        const price = selectedOption.getAttribute('data-price');
        
        const formattedPrice = `${parseFloat(price).toFixed(2).replace()}`;
        priceInput.value = formattedPrice;
    }
    });

    </script>

</x-app-layout>
