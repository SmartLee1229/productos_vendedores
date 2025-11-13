@extends('layouts.app')

@section('title','Editar Vendedor')

@section('content')
<div class="card shadow">
    <div class="card-header bg-warning text-dark"><h4>Editar Vendedor</h4></div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
        @endif

        <form action="{{ route('vendedores.update',$vendedor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required value="{{ old('nombre',$vendedor->nombre) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Cargo</label>
                <input type="text" name="cargo" class="form-control" value="{{ old('cargo',$vendedor->cargo) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="{{ old('telefono',$vendedor->telefono) }}">
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-primary" type="submit">Actualizar</button>
                <a href="{{ route('vendedores.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
