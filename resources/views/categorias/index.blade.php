@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Categorías</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3">Nueva Categoría</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                    <td>
                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar la categoría {{ $categoria->nombre }}?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
