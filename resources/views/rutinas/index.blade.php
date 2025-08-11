@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2>Rutinas subidas</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('rutinas.create') }}" class="btn btn-primary mb-3">Subir nueva rutina</a>

    <div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Fecha subida</th>
                <th class="text-end">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rutinas as $rutina)
            <tr>
                <td>{{ $rutina->id_rutina }}</td>
                <td>{{ $rutina->titulo }}</td>
                <td>{{ \Illuminate\Support\Str::limit($rutina->descripcion, 80) }}</td>
                <td class="text-center">
                    @if($rutina->archivo)
                        <img src="{{ asset('storage/' . $rutina->archivo) }}" alt="Imagen rutina" style="max-width:150px; height:auto; border-radius:5px;">
                    @else
                        Sin imagen
                    @endif
                </td>
                <td>
                    {{ $rutina->fecha_subida ? \Carbon\Carbon::parse($rutina->fecha_subida)->format('Y-m-d H:i') : ($rutina->created_at ? $rutina->created_at->format('Y-m-d H:i') : '') }}
                </td>
                <td class="text-end">
                    <a href="{{ route('rutinas.edit', $rutina->id_rutina) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('rutinas.destroy', $rutina->id_rutina) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Eliminar rutina?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No hay rutinas.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>
@endsection
