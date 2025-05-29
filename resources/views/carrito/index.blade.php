{{-- este index muestra la visual de CARRITO --}}

<x-app-layout>
    <x-slot name="header">
        <h2>Carrito de Compras</h2>
    </x-slot>
    
    @if(session('success'))
    <div>{{ session('success') }}</div>
    @endif
    
    <a href="{{ route('productos.index')  }}">ir a productos</a>
    <a href="{{ route('pedidos.index') }}">ir a Pedidos</a>

    @forelse ($carrito as $id => $item)
    
        <div style="border: 1px solid #ccc; padding: 10px; margin: 10px;">
            <h3>{{ $item['nombre'] }}</h3>
            <img src="{{ asset('storage/' . $item['imagen']) }}" width="100">
            <p>Precio: ${{ $item['precio'] }} x {{ $item['cantidad'] }}</p>
            <p>Total: ${{ $item['precio'] * $item['cantidad'] }}</p>
            <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                @csrf
                <button type="submit">Eliminar</button>
            </form>
        </div>
    @empty
        <p>El carrito está vacío.</p>
    @endforelse

    <h2>Total general: ${{ $total }}</h2>

    @if (!empty($carrito))
    <form action="{{ route('carrito.confirmar') }}" method="POST">
        @csrf
        <button type="submit">Confirmar Pedido</button>
    </form>
    @endif

</x-app-layout>