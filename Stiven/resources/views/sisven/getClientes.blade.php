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
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Numero Documento</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Nombre</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Apellido</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Direccion</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Fecha de nacimiento</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Numero de telefono</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Correo electronico</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700" colspan="3">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                    <tr class="border-t border-gray-200">
                                        <td class="px-4 py-2 text-sm text-gray-800">{{ $customer->document_number }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-800">{{ $customer->first_name }}</td> 
                                        <td class="px-4 py-2 text-sm text-gray-800">{{ $customer->last_name }}</td> 
                                        <td class="px-4 py-2 text-sm text-gray-800">{{ $customer->andress }}</td> 
                                        <td class="px-4 py-2 text-sm text-gray-800">{{ $customer->birthday }}</td> 
                                        <td class="px-4 py-2 text-sm text-gray-800">{{ $customer->phone_number }}</td> 
                                        <td class="px-4 py-2 text-sm text-gray-800">{{ $customer->email }}</td> 
                                       
                                        <td>
                                            <button class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" title="actualizar Producto">
                                                <a href="{{ route('custom.edit', ['id' => $customer->id]) }}" >
                                                    actualizar
                                            </button>
                                        </td>
                                        <td>
                                            <form action="{{ route('custom.destroy', ['id' => $customer->id]) }}" method="POST" class="inline-block">
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
                    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
