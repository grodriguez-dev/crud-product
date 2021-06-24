<x-slot name="header">
    <h1 class="text-gray-900">Crud con laravel 8 y Livewire</h1>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <h4>{{session('message')}}</h4>
                        </div>
                    </div>
                </div>
            @endif
            <button wire:click="crear()" class="bg-green-500 hover:bg-green-600 text-white fount-bold py-2 px-4 my-3">Nuevo</button>
            @if ($modal)
                @include('livewire.crear')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Amount</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="border px-4 py-2">{{$product->id}}</td>
                            <td class="border px-4 py-2">{{$product->description}}</td>
                            <td class="border px-4 py-2">{{$product->amount}}</td>
                            <td class="border px-4 py-2 text-center">
                                <button wire:click="edit({{$product->id}})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Edit</button>
                                <button wire:click="delete({{$product->id}})" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
