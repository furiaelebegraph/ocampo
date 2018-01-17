<?php

namespace App\Http\Controllers;

use App\Galeria;
use App\Imagen;
use Illuminate\Http\Request;

class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - Imagenes';
        $inmuebles = Galeria::all();
        return view('galeria.index', compact('inmuebles', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Crear Galeria';
        $inmueble = Galeria::findOrfail($id);
        return view('galeria.create', compact('title', 'inmueble'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $imagen = new Ima();
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $filename = time().'.'.$imagen->getClientOriginalExtension();
                $path = 'img/galeria/'.$filename;
                Image::make($imagen)->resize(null, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($path);

                $imagen->imagen = 'img/galeria/'.$filename;
            }

                $imagen->nombre = $request->nombre;

                $imagen->inmueble_id = $request->inmuebles_id;

                $imagen->orden = $request->orden;

                $imagen->activo = $request->activo;

                $imagen->save();

                return redirect('galeria');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $imagen = Galeria::findOrfail($id);
        $inmueble = Imagen::all();
        return view('galeria.edit',compact('imagen', 'inmueble'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $imagen = Galeria::findOrfail($id);
        return view('galeria.edit',compact('imagen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
            $inmueble = new Galeria();
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $filename = time().'.'.$imagen->getClientOriginalExtension();
                $path = 'img/galeria/'.$filename;
                Image::make($imagen)->resize(null, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($path);

                $galeria->imagen = 'img/galeria/'.$filename;
            }
                $galeria->nombre = $request->nombre;
                $galeria->orden = $request->alter;
                $galeria->activo = $request->activo;
                $galeria->descripcion = $request->descripcion;
                $galeria->save();
                $photos = $request->file('photos');
                if (!empty($photos)) {
                    foreach ($photos as $indexPhoto=>$photo) {
                        $nombre = $inmueble->nombre.'_'.$indexPhoto.'_'.$photo->hashName();
                        $path = 'img/ima/'.$nombre;
                        $imagenes = new Imagen();
                        Image::make($photo)->resize(null, 400, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        })->save($path);
                        $imagenes->inmueble_id = $galeria->id;
                        $imagenes->imagen = $path;
                        $imagenes->nombre =  $inmueble->nombre.'_'.$indexPhoto.'_'.$photo->hashName();
                        $imagenes->orden = $indexPhoto;
                        $imagenes->save();
                    }
                }

                return redirect('inmueble');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeria $galeria)
    {
        $imagen = Ima::findOrFail($id);
        $imagen->delete();
        return back()->with('info', 'Fue eliminado exitosamente');
    }
}
