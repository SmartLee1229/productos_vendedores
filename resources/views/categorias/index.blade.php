@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Listado de Categorías</h2>
    <a href="{{ route('categorias.create') }}" class="btn btn-success">+ Nueva Categoría</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nombre }}</td>
                <td>{{ $categoria->descripcion }}</td>
                <td>
                    <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning btn-sm">Editar</a>

                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('¿Seguro que deseas eliminar la categoría {{ $categoria->nombre }}?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No hay categorías registradas.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
