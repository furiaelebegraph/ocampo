<?php

namespace App\Http\Controllers;

use App\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - Imagenes';
        $noticias = Noticia::all();
        return view('noticia.index', compact('noticias', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Crear Galeria';
        $noticia = Noticia::findOrfail($id);
        return view('noticia.create', compact('title', 'noticia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $noticia = new Noticia();
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $filename = time().'.'.$imagen->getClientOriginalExtension();
                $path = 'img/ima/'.$filename;
                Image::make($imagen)->resize(null, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($path);

                $noticia->imagen = 'img/noticia/'.$filename;
            }

                $noticia->nombre = $request->nombre;

                $noticia->inmueble_id = $request->galerias_id;

                $noticia->orden = $request->orden;

                $noticia->activo = $request->activo;

                $noticia->save();

                return redirect('noticia');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $noticia = Noticia::findOrfail($id);
        return view('noticia.edit',compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $inmueble = Noticia::findOrfail($id);
        return view('noticia.edit',compact('imagen', 'inmueble'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
            $imagen = Ima::findOrfail($id);
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $filename = time().'.'.$imagen->getClientOriginalExtension();
                $path = 'img/ima/'.$filename;
                Image::make($imagen)->resize(null, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($path);

                $imagen->imagen = 'img/ima/'.$filename;
            }

                $imagen->nombre = $request->nombre;

                $imagen->inmueble_id = $request->galerias_id;

                $imagen->orden = $request->orden;

                $imagen->activo = $request->activo;

                $imagen->save();

                return redirect('noticia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $imagen = Ima::findOrFail($id);
        $imagen->delete();
        return back()->with('info', 'Fue eliminado exitosamente');
    }
}
