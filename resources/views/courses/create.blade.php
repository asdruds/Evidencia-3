@extends('layouts.plantilla')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Nuevo curso</h1>

            <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}">
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea class="form-control" id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="idioma">Idioma:</label>
                    <input type="text" class="form-control" id="idioma" name="idioma" value="{{ old('idioma') }}">
                </div>

                <div class="form-group">
                    <label for="nivel">Nivel:</label>
                    <select class="form-control" id="nivel" name="nivel">
                        <option value="Principiante">Principiante</option>
                        <option value="Intermedio">Intermedio</option>
                        <option value="Avanzado">Avanzado</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="profesor">Profesor:</label>
                    <input type="text" class="form-control" id="profesor" name="profesor" value="{{ old('profesor') }}">
                </div>

                <div class="form-group">
                    <label for="correo">Correo:</label>
                    <input type="email" class="form-control" id="correo" name="correo" value="{{ old('correo') }}">
                </div>

                <div class="form-group">
                    <label for="imagen">Imagen:</label>
                    <input type="file" class="form-control-file" id="imagen" name="imagen">
                </div>

                <button type="submit" class="btn btn-primary">Crear curso</button>
            </form>
        </div>
    </div>
@endsection
