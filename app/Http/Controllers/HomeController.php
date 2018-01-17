<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagen;
use App\Galeria;
use App\Banner;
use App\Noticia;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galerias = Galeria::all();
        $banners = Banner::all();
        $noticias = Noticia::all();

        $ultimagalerias = Galeria::orderBy('created_at','desc')->take(5)->get();
        $ultimosbanners = Banner::orderBy('created_at','desc')->take(3)->get();
        $ultimasnoticias = Noticia::orderBy('created_at','desc')->take(3)->get();
        return view('home', compact('noticias','galerias', 'banners', 'ultimagalerias', 'ultimosbanners', 'ultimasnoticias'));
    }
    public function layoutAdmin(){
        $categorias = Cate::all();
        $inmueble = Inmueble::all();
        return view('layouts.admin', compact('categorias', 'inmueble'));
    }
}
