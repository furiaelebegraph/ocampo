@extends('layouts.admin')

@section('contenido')
    <div class="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{url("/home")}}">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">My Dashboard</li>
            </ol>

        <!-- Icon Cards -->
            <div class="row">
                <div class="col-md-12 col-xs-12 col-centered">
                    <div class="col-xs-12 col-centered">
                        <div class="row">
                            <div class="col-6 ">
                                <form  method = 'get' action = '{{url("/home")}}'>
                                    <button class="button-two btn btn-primary" type = 'submit'><span class="texto_blanco">ADMIN</span></button>
                                </form>
                            </div>
                            <div class="col-6 ">
                                <form class = 'col s3' method = 'get' action = '{!!url("galeria")!!}/create'>
                                    <div class="sub-main">
                                      <button class="button-two btn btn-primary" type = 'submit'><span class="texto_blanco">Crear nuevo Inmueble</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">                            
                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <td>Inmueble</td>
                                        <td>categoria</td>
                                        <td>Imagen</td>
                                        <td>Precio</td>
                                        <td>Orden</td>
                                        <td>BORRAR</td>
                                        <td>EDITAR</td>
                                        <td>INFO</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($galerias as $galeria) 
                                    <tr>
                                        <td>{!!$galeria->nombre!!}</td>
                                        <td>
                                            {{$galeria->cate->nombre}}
                                        </td>
                                        <td> 
                                            <img class='imagen_index' style='width:80px;' src="{!!$galeria->imagen!!}" alt=""> 
                                        </td>
                                        <td>
                                            {{$galeria->precio}}
                                        </td>
                                        <td>
                                            {{$galeria->orden}}
                                        </td>
                                        <td>
                                            <a href="/galeria/{!!$galeria->id!!}/delete" class = 'delete btn btn-danger btn-xs'><i class = 'material-icons'>Borrar</i></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('galeria.edit', $galeria->id) }}" class = 'viewEdit btn btn-primary btn-xs' data-link = '/subcategoria/{!!$galeria->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                                        </td>
                                        <td>
                                            <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/subcategoria/{!!$galeria->id!!}'><i class = 'material-icons'>info</i></a>
                                        </td>
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {!! $galerias->links() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection