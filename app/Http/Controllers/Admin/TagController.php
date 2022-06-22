<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.create')->only('create', 'store');
        $this->middleware('can:admin.tags.edit')->only('edit', 'update');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
    }

    public function index()
    {

        $tags = Tag::all();

        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        $colors = [
            'red' => 'Color rojo',
            'yellow' => 'Color amarillo',
            'green' => 'Color verde',
            'blue' => 'Color azul',
            'ingido' => 'Color indigo',
            'Purple' => 'Color morado',
            'pink' => 'Color rosado'
        ];

        return view('admin.tags.create', compact('colors'));
    }

    public function store(Request $request)
    {
        // Lo mas correcto a la hora de crear REGLAS DE VALIDACION para crear nuevas secciones("tags")
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags',
            'color' => 'required'
        ]);

        // Aca no era created si no create (Aveces se instancia solo por las extensiones) revisar
        $tag = Tag::create($request->all());
        return redirect()->route('admin.tags.edit', compact('tag'))->with('info', 'La etiqueta se creo con exito');
    }

    public function edit(Tag $tag)
    {

        $colors = [
            'red' => 'Color rojo',
            'yellow' => 'Color amarillo',
            'green' => 'Color verde',
            'blue' => 'Color azul',
            'ingido' => 'Color indigo',
            'Purple' => 'Color morado',
            'pink' => 'Color rosado'
        ];

        return view('admin.tags.edit', compact('tag', 'colors'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id",
            'color' => 'required'
        ]);

        $tag->update($request->all()); /* El with a continuacion viene ser el mensaje de session */
        return redirect()->route('admin.tags.edit', $tag)->with('info', 'La etiqueta se actualizo con exito');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index')->with('info', 'La etiqueta se elimino con exito');
    }
}
