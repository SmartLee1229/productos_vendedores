@extends('layout')

@section('title', 'Editar Vendedor')

@section('content')
<h2 class="mb-4">Editar Vendedor</h2>

<form action="{{ route('vendedores.update', $vendedor->id) }}" method="POST" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $vendedor->nombre }}" required>
    </div>

    <div class="mb-3">
        <label for="cargo" class="form-label">Cargo:</label>
        <input type="text" name="cargo" id="cargo" class="form-control" value="{{ $vendedor->cargo }}" required>
    </div>

    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $vendedor->telefono }}">
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('vendedores.index') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection
