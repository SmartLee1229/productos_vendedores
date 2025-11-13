@extends('layouts.app')

@section('title','Crear Categoría')

@section('content')
<div class="card shadow">
    <div class="card-header bg-success text-white"><h4>Crear Categoría</h4></div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
        @endif

        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required value="{{ old('nombre') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input type="number" name="stock" min="0" class="form-control" required value="{{ old('stock',0) }}">
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
