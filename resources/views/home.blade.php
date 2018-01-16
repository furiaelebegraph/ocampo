@extends('layouts.admin')

@section('contenido')
    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{route('home')}}">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">My Dashboard</li>
        </ol>

        <!-- Icon Cards -->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white color_morado3_back o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-list" aria-hidden="true"></i>
                </div>
                <div class="mr-5">
                  {{$categorias->count()}} Categorias <br>
                </div>
              </div>
              <a href="{{url('categoria')}}" class="card-footer text-white clearfix small z-1">
                <span class="float-left">Ver todas las Categorias</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
                <a href="{{route('categoria.create')}}" class="card-footer text-white clearfix small z-1">
                    <span class="float-left">NUEVA Categoria</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
          </div>
            <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white color_morado2_back o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-picture-o" aria-hidden="true"></i>
                </div>
                <div class="mr-5">
                  {{$banners->count()}} Banner
                </div>
              </div>
              <a href="{{url('banner')}}" class="card-footer text-white clearfix small z-1">
                <span class="float-left">Ver todas los Banners</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
                <a href="{{route('banner.create')}}" class="card-footer text-white clearfix small z-1">
                    <span class="float-left">NUEVO BANNER</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white color_morado1_back o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <div class="mr-5">
                  {{$inmuebles->count()}} inmuebles
                </div>
              </div>
                <a href="{{url('inmueble')}}" class="card-footer text-white clearfix small z-1">
                    <span class="float-left">Ver todas los inmuebles</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
                <a href="{{route('inmueble.create')}}" class="card-footer text-white clearfix small z-1">
                    <span class="float-left">NUEVO inmueble</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
          </div>
        </div>

          <div class="row">
            <div class="col-12">
              <div class="mb-0 mt-4">
                <i class="fa fa-newspaper-o"></i>
                Ultimos elementos creados</div>
              <hr class="mt-2">

                <!-- Example Social Card -->
               <div class="row">
                @foreach($ultimoinmuebles as $ultimoinmueble)
                  <div class="col-4">
                      <div class="card mb-3">
                            <a href="/inmueble/{!!$ultimoinmueble->id!!}">
                                <img class="card-img-top img-fluid w-100"  src="{{$ultimoinmueble->imagen}}" alt="">
                            </a>
                            <div class="card-body">
                              <h6 class="card-title mb-1">
                                <a href="/inmueble/{!!$ultimoinmueble->id!!}">{{$ultimoinmueble->nombre}}</a>
                              </h6>
                              <p class="card-text small">These waves are looking pretty good today!
                                <a href="#">#surfsup</a>
                              </p>
                            </div>
                            <hr class="my-0">
                            <div class="card-body py-2 small">
                              <a class="mr-3 d-inline-block" href="/inmueble/{!!$ultimoinmueble->id!!}/edit">
                                <i class="fa fa-fw fa-edit"></i>
                                Editar
                              </a>
                              <a class="mr-3 d-inline-block" href="/inmueble/{!!$ultimoinmueble->id!!}/delete">
                                <i class="fa fa-fw fa-times"></i>
                                Eliminar
                              </a>
                            </div>
                            <div class="card-footer small text-muted">
                              Creado {{$ultimoinmueble->created_at->toFormattedDateString()}}
                            </div>
                      </div>
                      </div>
                    @endforeach
                    <!-- Example Social Card -->
                    </div>
               <div class="row">

                    @foreach($ultimacates as $ultimacate)
                    <div class="col-4">
                      <div class="card mb-3">
                        <a href="/categoria/{!!$ultimacate->id!!}">
                            <img class="card-img-top img-fluid w-100"  src="{{$ultimacate->imagen}}" alt="">
                        </a>
                        <div class="card-body">
                          <h6 class="card-title mb-1">
                            <a href="/categoria/{!!$ultimacate->id!!}">{{$ultimacate->nombre}}</a>
                          </h6>
                          <p class="card-text small">These waves are looking pretty good today!
                            <a href="#">#surfsup</a>
                          </p>
                        </div>
                        <hr class="my-0">
                        <div class="card-body py-2 small">
                          <a class="mr-3 d-inline-block" href="/categoria/{!!$ultimacate->id!!}/edit">
                            <i class="fa fa-fw fa-edit"></i>
                            Editar
                          </a>
                          <a class="mr-3 d-inline-block" href="/categoria/{!!$ultimacate->id!!}/delete">
                            <i class="fa fa-fw fa-times"></i>
                            Eliminar
                          </a>
                        </div>
                        <div class="card-footer small text-muted">
                          Creado {{$ultimacate->created_at->toFormattedDateString()}}
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
            <!-- Card Columns Example Social Feed -->



            </div>
            <!-- /Card Columns -->

          </div>

          <div class="col-lg-4">
            <!-- Example Notifications Card -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-bell-o"></i>
                Categorias
              </div>
              <div class="list-group list-group-flush small">
                @foreach($categorias as $catego)
                  <a href="categoria/{{$catego->id}}" class="list-group-item list-group-item-action">
                    <div class="media">
                      <img class="d-flex mr-3 rounded-circle imagen_cate_admin" src="{{asset($catego->imagen)}}" alt="">
                      <div class="media-body">
                        <strong>{{$catego->nombre}}</strong>
                        <div class="text-muted smaller">{{$catego->created_at}}</div>
                      </div>
                    </div>
                  </a>

                @endforeach
              </div>
              <div class="card-footer small text-muted">
                Updated yesterday at 11:59 PM
              </div>
            </div>
          </div>
        </div>

        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            Data Table Example
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Subcategoria</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Subcategoria</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                  </tr>
                </tfoot>
                <tbody>
                    @foreach($inmuesbles as $prosdusto)
                    <tr>
                        <td>{{$prosdusto->nombre}}</td>
                        <td><img class='w-100' src="{{asset($prosdusto ->imagen)}}" alt=""></td>
                        <td><a href="{{ route('inmueble.edit', $prosdusto->id) }}" class = 'viewEdit btn btn-primary btn-xs'><i class = 'material-icons'>edit</i></td>
                        <td><a href="/inmueble/{!!$prosdusto->id!!}/delete" class = "delete btn btn-danger btn-xs"><i class = 'material-icons'>Borrar</i></a></td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
@endsection
