<label>Nombre:</label>
<input type="text" name="nombre" value="{{ old('nombre', $producto->nombre ?? '') }}"><br>

<label>Descripción:</label>
<textarea name="descripcion">{{ old('descripcion', $producto->descripcion ?? '') }}</textarea><br>

<label>Precio:</label>
<input type="number" name="precio" step="0.01" value="{{ old('precio', $producto->precio ?? '') }}"><br>
<label>Imagen:</label>
<input type="file" name="imagen"><br>

@if(isset($producto) && $producto->imagen)
    <img src="{{ asset('storage/' . $producto->imagen) }}" width="100">
@endif

<button type="submit">Guardar</button>

