@extends('layouts.app')

@section('title','Vendedores')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Vendedores</h2>
    <a href="{{ route('vendedores.create') }}" class="btn btn-success">+ Nuevo Vendedor</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cargo</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vendedores as $v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->nombre }}</td>
                    <td>{{ $v->cargo }}</td>
                    <td>{{ $v->telefono }}</td>
                    <td>
                        <a href="{{ route('vendedores.edit',$v->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('vendedores.destroy',$v->id) }}" method="POST" class="d-inline delete-form" data-nombre="{{ $v->nombre }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center">No hay vendedores.</td></tr>
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
        if (confirm('¿Seguro que deseas eliminar a ' + nombre + '?')) form.submit();
    });
});
</script>
@endsection
