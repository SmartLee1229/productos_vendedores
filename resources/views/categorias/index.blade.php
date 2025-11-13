@extends('layouts.app')

@section('title','Categorías')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Categorías</h2>
    <a href="{{ route('categorias.create') }}" class="btn btn-success">+ Nueva Categoría</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                    <td>{{ $categoria->stock }}</td>
                    <td>
                        <a href="{{ route('categorias.edit',$categoria->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('categorias.destroy',$categoria->id) }}" method="POST" class="d-inline delete-form" data-nombre="{{ $categoria->nombre }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center">No hay categorías.</td></tr>
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
        if (confirm('¿Seguro que deseas eliminar la categoría ' + nombre + '?')) form.submit();
    });
});
</script>
@endsection
