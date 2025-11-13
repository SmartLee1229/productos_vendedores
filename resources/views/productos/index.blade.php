@extends('layouts.app')

@section('title','Productos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Productos</h2>
    <a href="{{ route('productos.create') }}" class="btn btn-success">+ Nuevo Producto</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>${{ number_format($producto->precio,2) }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>
                    <td>
                        <a href="{{ route('productos.edit',$producto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('productos.destroy',$producto->id) }}" method="POST" class="d-inline delete-form" data-nombre="{{ $producto->nombre }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center">No hay productos.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', e => {
        e.preventDefault();
        const nombre = form.getAttribute('data-nombre');
        if (confirm('¿Seguro que deseas eliminar el producto ' + nombre + '?')) form.submit();
    });
});
</script>
@endsection
