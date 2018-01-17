<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagen;
use App\Galeria;
use App\Banner;
use App\Noticia;
use Carbon\Carbon;
use App\Mail\EnviarCorreo;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function welcome(Request $request){

        $categorias = Cate::all();
        $banners = Banner::BannerActivo();
        $galerias = Noticia::where('activo', '=', 'si')->orderBy('created_at', 'desc')->paginate(9);
        $galerias = galerias::orderBy('created_at', 'desc')->first();
        return view('welcome', compact('categorias', 'galerias', 'galerias', 'banners','inmueblis'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showPaginacion(Request $request)
    {
        $galerias = Inmueble::paginate(9);
        return view('inmueble.data')->with('galerias', $galerias);
    }


    public function ajaxCategoria($id){
        $galerias = Inmueble::obtenerCatego($id);
        return view('inmueble.data')->with('galerias', $galerias);
    }

    public function ajaxDetalle($id){
        $inmueble = Inmueble::with('Ima')->findOrfail($id);

        return view('inmueble.detalle')->with('inmueble', $inmueble);
    }

    public function enviarCorreo(Request $request){
        $rules = [
            'nombre'    => 'required|max:255',
            'correo'    => 'required|email',
            'contenido' => 'required|min:5',
        ];
        $mensaje = [
            'required' => 'El :attribute es necesario.'
        ];

        $this->validate($request, $rules, $mensaje);

        $input = $request->all();
        Mail::to('emmanegr@gmail.com')->send(new EnviarCorreo($input));
        return back()->with('mensaje', 'Su correo fue enviado!');
    }
}