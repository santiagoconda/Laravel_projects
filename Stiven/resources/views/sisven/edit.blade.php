<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actualizar productos') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-lg overflow-hidden">
                <div class="p-8 space-y-6">
    
                    <form action="{{ route('products.update',$product->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Producto</label>
                            <input type="text" name="name" id="name" value="{{old('name',$product->name)}}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                            <div class="form-group">
                            <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
                            <input type="number" name="price" id="price" value="{{old('name',$product->price)}}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" step="0.01" required>
                        </div>
                            <div class="form-group">
                            <label for="stok" class="block text-sm font-medium text-gray-700">Cantidad en Stock</label>
                            <input type="number" name="stok" id="stok"  value="{{old('name',$product->stok)}}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                            <div class="form-group">
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                            <select name="category_id" id="category_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>                               
                                @endforeach
                            </select>
                        </div>    
                        <button type="submit" class="w-full py-3 px-4 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Actualizar
                        </button>
                    </form>
    
                </div>
            </div>
        </div>
    </div>
    

</x-app-layout>
