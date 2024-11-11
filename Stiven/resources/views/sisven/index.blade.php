<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="container mx-auto p-4">
                        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                            <thead class="bg-blue-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Nombre</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Precio</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Stock</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Categoría</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr class="border-t border-gray-200">
                                        <td class="px-4 py-2 text-sm text-gray-800">{{ $product->name }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-800">{{ number_format($product->price,) }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-800">{{ $product->stok }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-800">{{ $product->category ? $product->category->name : 'Sin categoría' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>