@extends('layouts.app')

@section('title', 'Lista de Vendedores')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Lista de Vendedores</h2>
        <a href="{{ route('vendedores.create') }}" class="btn btn-success">+ Agregar Vendedor</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vendedores as $vendedor)
                        <tr>
                            <td>{{ $vendedor->id }}</td>
                            <td>{{ $vendedor->nombre }}</td>
                            <td>{{ $vendedor->correo }}</td>
                            <td>{{ $vendedor->telefono }}</td>
                            <td>
                                <a href="{{ route('vendedores.edit', $vendedor->id) }}" class="btn btn-primary btn-sm">Editar</a>

                                <form action="{{ route('vendedores.destroy', $vendedor->id) }}" 
                                      method="POST" 
                                      class="d-inline delete-form" 
                                      data-nombre="{{ $vendedor->nombre }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if($vendedores->isEmpty())
                <div class="text-center text-muted py-3">
                    No hay vendedores registrados.
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
<script>
document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', e => {
        e.preventDefault();
        const nombre = form.getAttribute('data-nombre');
        if (confirm('¿Seguro que deseas eliminar a ' + nombre + '?')) {
            form.submit();
        }
    });
});
</script>
@endsection
