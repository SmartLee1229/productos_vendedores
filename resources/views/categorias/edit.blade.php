@extends('layouts.app')

@section('title','Editar Categoría')

@section('content')
<div class="card shadow">
    <div class="card-header bg-warning text-dark"><h4>Editar Categoría</h4></div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
        @endif

        <form action="{{ route('categorias.update',$categoria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required value="{{ old('nombre',$categoria->nombre) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control">{{ old('descripcion',$categoria->descripcion) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input type="number" name="stock" min="0" class="form-control" required value="{{ old('stock',$categoria->stock) }}">
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-primary" type="submit">Actualizar</button>
                <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
