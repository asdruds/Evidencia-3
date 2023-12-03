@extends('layouts.plantilla')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Editar curso</h1>

            <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $course->titulo }}">
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea class="form-control" id="descripcion" name="descripcion">{{ $course->descripcion }}</textarea>
                </div>

                <div class="form-group">
                    <label for="idioma">Idioma:</label>
                    <input type="text" class="form-control" id="idioma" name="idioma" value="{{ $course->idioma }}">
                </div>

                <div class="form-group">
                    <label for="nivel">Nivel:</label>
                    <select class="form-control" id="nivel" name="nivel">
                        <option value="Principiante" {{ $course->nivel === 'Principiante' ? 'selected' : '' }}>Principiante</option>
                        <option value="Intermedio" {{ $course->nivel === 'Intermedio' ? 'selected' : '' }}>Intermedio</option>
                        <option value="Avanzado" {{ $course->nivel === 'Avanzado' ? 'selected' : '' }}>Avanzado</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="profesor">Profesor:</label>
                    <input type="text" class="form-control" id="profesor" name="profesor" value="{{ $course->profesor }}">
                </div>

                <div class="form-group">
                    <label for="correo">Correo:</label>
                    <input type="email" class="form-control" id="correo" name="correo" value="{{ $course->correo }}">
                </div>

                <div class="form-group">
                    <label for="imagen">Imagen:</label>
                    <input type="file" class="form-control-file" id="imagen" name="imagen">
                    @if ($course->imagen)
                        <img src="{{ asset('storage/' . $course->imagen) }}" alt="Imagen del course" class="mt-2" style="max-width: 300px;">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
@endsection
