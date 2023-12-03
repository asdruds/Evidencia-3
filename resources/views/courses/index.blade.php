@extends('layouts.plantilla')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Listado de cursos</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Nuevo curso</a>

            @if($courses->isEmpty())
                <p>No hay cursos disponibles.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Idioma</th>
                            <th>Nivel</th>
                            <th>Profesor</th>
                            <th>Correo</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{ $course->titulo }}</td>
                                <td>{{ $course->idioma }}</td>
                                <td>{{ $course->nivel }}</td>
                                <td>{{ $course->profesor }}</td>
                                <td>{{ $course->correo }}</td>
                                
                                <td>
                                    <a href="{{ route('courses.show', $course->id) }}">Ver</a>
                                    <a href="{{ route('courses.edit', $course->id) }}">Editar</a>
                                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
