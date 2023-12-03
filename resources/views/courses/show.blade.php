@extends('layouts.plantilla')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Detalles del curso</h1>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $course->titulo }}</h5>
                    <p class="card-text"><strong>Descripción:</strong> {{ $course->descripcion }}</p>
                    <p class="card-text"><strong>Idioma:</strong> {{ $course->idioma }}</p>
                    <p class="card-text"><strong>Nivel:</strong> {{ $course->nivel }}</p>
                    <p class="card-text"><strong>Profesor:</strong> {{ $course->profesor }}</p>
                    <p class="card-text"><strong>Correo:</strong> {{ $course->correo }}</p>
                    @if ($course->imagen)
                        <img src="{{ asset('storage/' . $course->imagen) }}">
                    @else
                        <p>No hay imagen disponible</p>
                    @endif
                </div>
            </div>

            <a href="{{ route('courses.index') }}" class="btn btn-secondary mt-3">Volver al Listado</a>
        </div>
    </div>
@endsection
