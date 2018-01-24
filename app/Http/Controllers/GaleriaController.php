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
        $galerias = Galeria::all();
        return view('galeria.index', compact('galerias', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Crear Galeria';
        $galeria = Galeria::findOrfail($id);
        return view('galeria.create', compact('title', 'galeria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $galeria = new Galeria();
      if ($request->hasFile('imagen')) {
          $imagen = $request->file('imagen');
          $filename = time().'.'.$imagen->getClientOriginalExtension();
          $path = 'img/galeria/'.$filename;
          Image::make($imagen)->resize(null, 600, function ($constraint) {
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
                  Image::make($photo)->resize(null, 600, function ($constraint) {
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
     * Display the specified resource.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $galeria = Galeria::findOrfail($id);
        $imagen = Imagen::all();
        return view('galeria.edit',compact('galeria', 'imagen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $galeria = Galeria::findOrfail($id);
        return view('galeria.edit',compact('galeria'));
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
            galeria = Galeria::findOrfail($id);
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $filename = time().'.'.$imagen->getClientOriginalExtension();
                $path = 'img/galeria/'.$filename;
                Image::make($imagen)->resize(null, 600, function ($constraint) {
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
                        Image::make($photo)->resize(null, 600, function ($constraint) {
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
