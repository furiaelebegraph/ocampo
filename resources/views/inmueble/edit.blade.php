@extends('layouts.admin')
    <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea',plugins: "lists" });</script>
@section('contenido')
    <div class="content-wrapper">

      <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li class='alert alert-danger'>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @if(Session::has('info'))
            <div class="alert alert-info">
                {{ Session::get('info') }}
            </div>
        @endif
        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{url("/home")}}">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">My Dashboard</li>
        </ol>

        <!-- Icon Cards -->
        <div class="row">
          <div class="col-12 mb-12">
                    <h1>
                        Editar Inmueble
                    </h1>
                    <form method = 'get' action = '{!!url("inmueble")!!}'>
                        <button class = 'btn btn-danger'>Ver Inmuebles</button>
                    </form>
                    <br>
                    <form method = 'POST' action = '{!! url("inmueble")!!}/{!!$inmueble->
                        id!!}/update' enctype="multipart/form-data"> 
                        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" name = "nombre" type="text" class="form-control" value="{!!$inmueble->nombre!!}"> 
                        </div>
                        <div class="form-group">
                            <label for="imagen">imagen</label>
                            <img src="{!! asset($inmueble->imagen)!!}" alt="">
                            <input id="imagen" name = "imagen" type="file" class="form-control" value="{!!$inmueble->imagen!!}"> 
                        </div>
                        <div class="form-group">
                            <label for="titulo">Descripcion Corta</label>
                            <input id="titulo" name = "titulo" type="text" class="form-control" value="{!!$inmueble->titulo!!}">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion Larga</label>
                            <textarea rows="10"  id="descripcion" name = "descripcion" type="text" class="form-control" value="{!!$inmueble->descripcion!!}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input id="precio" name = "precio" type="text" class="form-control" value="{!!$inmueble->precio!!}"> 
                        </div>
                        <div class="form-group">
                            <label for="orden">Orden</label>
                            <input id="orden" name = "orden" type="text" class="form-control" value="{!!$inmueble->orden!!}"> 
                        </div>
                        <div class="form-group">
                            <label for="orden">Categoria</label>
                            <select id='cate' class="form-control"  name="id_categoria">
                                <option selected="selected" value="{{$inmueble->cate->id}}">{{$inmueble->cate->nombre}}</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                @endforeach
                            </select>
                        </div>{{-- 
                        <div class="form-group{{ $errors->has('subcate') ? ' has-error' : '' }}">
                            <label for="subcate" class="col-md-12 control-label">Sub Categoria</label>
                            <select name="id_subcategoria" class="form-control" id='subcate'>
                                 <option selected="selected" value="{{$producto->subcate->id}}">{{$producto->subcate->nombre}}</option>
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label for="orden">Activo</label>
                            <select class="form-control"  name="activo">
                                <option selected="selected" value="{{$inmueble->activo}}">{{$inmueble->activo}}</option>
                                <option value="si">Si</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <button class = 'btn btn-primary' type ='submit'>Update</button>
                    </form>
                    <div class="col-12">
                        @if($inmueble->ima->count() <= 0)
                            <div class="jumbotron text-center">
                                <div class="container">
                                    <h1 class="jumbotron-heading">No hay fotos en esta Galeria</h1>
                                    <div class="card">
                                      <div class="card-block">
                                        <form method='POST' action="{!! url("imagen/cargarGale")!!}" enctype="multipart/form-data">
                                            <input type="hidden" name = '_token' value = '{{Session::token()}}'>
                                            <input type="hidden" name="id_inmueble" value={{$inmueble->id}}>
                                            <input type="hidden" name="nombreProdu" value={{$inmueble->nombre}}>
                                            <div class="form-group">
                                                <label  class="col-2 col-form-label" for="galeria">Agregar Galeria</label>
                                                <input  class="form-control" type="file" name="galeria[]" multiple>
                                            </div>

                                            <button class='text-right btn btn-primary' type='submit'>Update</button>
                                        </form>
                                      </div> 
                                    </div>
                                </div>
                            </div>

                        @else
                            <div class="jumbotron text-center">
                                <div class="container">
                                    <h1 class="jumbotron-heading">Galeria</h1>
                                    <div class="row">
                                        <div class="card-deck">
                                            @foreach($inmueble->ima as $imagents)
                                            <div class="card">
                                                <img class="card-img-top" src="{{asset($imagents->imagen)}}" alt="">
                                                <div class="card-block">
                                                    <a class="btn btn-primary" href="/imagen/{{$imagents->id}}/edit">Editar</a>
                                                </div>
                                            </div>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        @endif
                    </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        })
            
        $('#cate').append(' Please choose one');
        $('#cate').on('change',function(e){
            var potato = e.target.value;
            console.log(potato);
            $.get('/ajaxSucate/'+ potato+'', function(data){

                $('#subcate').empty();
                $('#subcate').append('<option>Elije una opcion </option>');
                console.log(data);
                $.each(data, function(index, subcateObj){
                    $('#subcate').append('<option value="'+ subcateObj.id+'">'+ subcateObj.nombre +'</option>');
                });
            });
        });
    });
</script>
@endsection