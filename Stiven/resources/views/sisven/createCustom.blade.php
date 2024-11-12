<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear productos') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-lg overflow-hidden">
                <div class="p-8 space-y-6">
    
                    <form action="{{ route('custom.store') }}" method="POST" class="space-y-6">
                        @csrf
                            <div class="form-group">
                            <label for="document_number" class="block text-sm font-medium text-gray-700">Numero Documento</label>
                            <input type="number" name="document_number" id="document_number" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                            <div class="form-group">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" name="first_name" id="first_name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" step="0.01" required>
                        </div>
                            <div class="form-group">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Apellido</label>
                            <input type="text" name="last_name" id="last_name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" step="0.01" required>
                        </div>
                            <div class="form-group">
                            <label for="andress" class="block text-sm font-medium text-gray-700">Direccion</label>
                            <input type="text" name="andress" id="andress" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" step="0.01" required>
                        </div>
                     
                            <div class="form-group">
                            <label for="birthday" class="block text-sm font-medium text-gray-700">Fecha de nacimiento</label>
                            <input type="date" name="birthday" id="birthday" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" step="0.01" required>
                        </div>
                            <div class="form-group">
                            <label for="email" class="block text-sm font-medium text-gray-700">Correo electronico</label>
                            <input type="email" name="email" id="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" step="0.01" required>
                        </div>
                            <div class="form-group">
                            <label for="phone_number" class="block text-sm font-medium text-gray-700">Numero de telefono</label>
                            <input type="number" name="phone_number" id="phone_number" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                           
                        <button type="submit" class="w-full py-3 px-4 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Crear 
                        </button>
                    </form>
    
                </div>
            </div>
        </div>
    </div>
    

</x-app-layout>
