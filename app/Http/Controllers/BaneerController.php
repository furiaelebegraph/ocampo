<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Image;

class BaneerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - Banner';
        $banners = Banner::paginate(10);
        return view('banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Crear Banner';
        return view('banner.create', compact('title', 'company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $banner = new Banner();
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $filename = time().'.'.$imagen->getClientOriginalExtension();
                $path = 'img/banner/'.$filename;
                Image::make($imagen)->resize(null, 1000, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($path);

                $banner->imagen = 'img/banner/'.$filename;
            }

                $banner->nombre = $request->nombre;

                $banner->activo = $request->sino;

                $banner->orden = $request->alter;

                $banner->save();

                return redirect('banner');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        $title = 'Mostrar Banner';

        if($request->ajax())
        {
            return URL::to('banner/'.$id);
        }

        $banner = Banner::findOrfail($id);
        return view('banner.show',compact('title','banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        $banner = Banner::findOrfail($id);
        return view('banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
            $banner = Banner::findOrfail($id);
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $filename = time().'.'.$imagen->getClientOriginalExtension();
                $path = 'img/banner/'.$filename;
                Image::make($imagen)->resize(null, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($path);

                $banner->imagen = 'img/banner/'.$filename;
            }else{

            }

                $banner->nombre = $request->nombre;

                $banner->activo = $request->activo;

                $banner->orden = $request->orden;

                $banner->save();

                return redirect('banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner = Banner::find($id);
        $banner->delete();
        return back()->with('info', 'Fue eliminado exitosamente');
    }
}
