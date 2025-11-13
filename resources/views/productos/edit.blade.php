@extends('layouts.app')

@section('title','Editar Producto')

@section('content')
<div class="card shadow">
    <div class="card-header bg-warning text-dark"><h4>Editar Producto</h4></div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
        @endif

        <form action="{{ route('productos.update',$producto->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required value="{{ old('nombre',$producto->nombre) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="number" step="0.01" name="precio" class="form-control" required value="{{ old('precio',$producto->precio) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" min="0" required value="{{ old('stock',$producto->stock) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control">{{ old('descripcion',$producto->descripcion) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <select name="categoria_id" class="form-select" required>
                    <option value="">-- Seleccione --</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" @selected(old('categoria_id',$producto->categoria_id) == $categoria->id)>{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-primary" type="submit">Actualizar</button>
                <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
