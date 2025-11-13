@extends('layout')

@section('title', 'Crear Vendedor')

@section('content')
<h2 class="mb-4">Nuevo Vendedor</h2>

<form action="{{ route('vendedores.store') }}" method="POST" class="card p-4 shadow-sm">
    @csrf

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="cargo" class="form-label">Cargo:</label>
        <input type="text" name="cargo" id="cargo" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('vendedores.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
