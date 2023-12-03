<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Curso::all(); 
        return view("courses.index", ['courses' => $courses]);
    }

    public function create()
    {
        return view("courses.create");
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'idioma' => 'required|max:100',
            'nivel' => 'required|in:Principiante,Intermedio,Avanzado',
            'profesor' => 'required|max:100',
            'correo' => 'required|email|unique:cursos,correo',
            'imagen' => 'required|image',
        ]);

        $course = new Curso;
        $course->titulo = $request->titulo;
        $course->descripcion = $request->descripcion;
        $course->idioma = $request->idioma;
        $course->nivel = $request->nivel;
        $course->profesor = $request->profesor;
        $course->correo = $request->correo;

        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('course_images', 'public');
            $course->imagen = $imagePath;
        }

        $course->save();
        return redirect()->route('courses.index')->with('success', 'Curso creado con éxito');
    }

    public function show($id)
    {
        $course = Curso::find($id);
        return view("courses.show", compact('course'));
    }

    public function edit($id)
    {
        $course = Curso::find($id);
        return view('courses.edit', ['course' => $course]);    
    }

    public function update(Request $request, $id)
    {
        $course = Curso::find($id);

        $validatedData = $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'idioma' => 'required|max:100',
            'nivel' => 'required|in:Principiante,Intermedio,Avanzado',
            'profesor' => 'required|max:100',
            'correo' => 'required|email|unique:cursos,correo,'.$id,
            'imagen' => 'nullable|image',
        ]);

        $course->titulo = $request->titulo;
        $course->descripcion = $request->descripcion;
        $course->idioma = $request->idioma;
        $course->nivel = $request->nivel;
        $course->profesor = $request->profesor;
        $course->correo = $request->correo;

        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('course_images', 'public');
            $course->imagen = $imagePath;
        }

        $course->save();
        return redirect()->route('courses.index')->with('success', 'Curso actualizado con éxito');
    }

    public function destroy($id)
    {
        $course = Curso::find($id);
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Curso eliminado con éxito');
    }
}
