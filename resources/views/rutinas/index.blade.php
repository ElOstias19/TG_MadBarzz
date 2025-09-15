@extends('layouts.private')

@section('contenido')
<div class="container">
    <h2 class="mb-4">Rutinas subidas</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('rutinas.create') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-circle-plus me-2"></i> Subir nueva rutina
    </a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Entrenador</th>
                    <th>Fecha subida</th>
                    <th class="text-center">Acciones</th>
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
                            {{ $rutina->entrenador->persona->nombre_completo ?? '' }}
                            {{ $rutina->entrenador->persona->apellido_paterno ?? '' }}
                            {{ $rutina->entrenador->persona->apellido_materno ?? '' }}
                        </td>
                        <td>
                            {{ $rutina->fecha_subida ? \Carbon\Carbon::parse($rutina->fecha_subida)->format('Y-m-d H:i') : ($rutina->created_at ? $rutina->created_at->format('Y-m-d H:i') : '') }}
                        </td>
                        <td class="text-center">
                            <div class="d-inline-flex gap-1">
                                <a href="{{ route('rutinas.edit', $rutina->id_rutina) }}" 
                                   class="btn btn-warning btn-sm" 
                                   title="Editar">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('rutinas.destroy', $rutina->id_rutina) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('¿Eliminar rutina?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" title="Eliminar">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay rutinas subidas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
