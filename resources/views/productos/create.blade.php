<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('productos') }}
        </h2>
    </x-slot>
    <h1>Productos</h1>
    <h1>Crear Producto</h1>
    <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data" >
        @csrf
        @include('productos.form')
    </form>
</x-app-layout>

