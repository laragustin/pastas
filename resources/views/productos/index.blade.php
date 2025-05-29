{{-- este index muestra la visual de PRODUCTOS --}}


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('productos') }}
        </h2>
    </x-slot>
    <a href="{{ route('carrito.index') }}">ir a carrito</a>

    <a href="{{ route('pedidos.index') }}">ir a Pedidos</a>
    <h1>Productos</h1>

    <a href="{{ route('productos.create') }}">Crear nuevo producto</a>

    <ul>
        @foreach ($productos as $producto)
            {{-- @dd($producto) --}}
            <li>
                {{ $producto->nombre }} - ${{ $producto->precio }}
                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="" width="150">
                <a href="{{ route('productos.edit', $producto) }}">Editar</a>
                <form action="{{ route('carrito.agregar', $producto) }}" method="POST" style="display:inline">
                    @csrf
                    <button type="submit">Agregar Carrito</button>
                </form>
                <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>


</x-app-layout>
