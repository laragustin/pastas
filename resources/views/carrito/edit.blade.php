<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('productos') }}
        </h2>
<h1>Editar Producto</h1>
<form method="POST" action="{{ route('productos.update', $producto) }}"enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('productos.form')
</form>
</x-app-layout>

