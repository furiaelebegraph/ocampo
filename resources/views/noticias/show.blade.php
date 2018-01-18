@extends('layouts.admin')
@section('contenido')
    <div class="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">My Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card-columns">
                        <div class="card mb-3">
                            <img class="card-img-top img-fluid w-100"  src="{{asset($categoria->imagen)}}" alt="">
                        </div>
                        <div class="card-body">
                              <h3 class="card-title mb-1">
                                <a  href="/categoria/{!!$categoria->id!!}">{{$categoria->nombre}}</a>
                              </h3>
                              <p class="card-text small">Editar
                                <a href="/categoria/{!!$categoria->id!!}/edit">#surfsup</a>
                              </p>

                              <p class="card-text small">Eliminar
                                <a href="/categoria/{!!$categoria->id!!}/edit">#surfsup</a>
                              </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-11">
                <div class="row">
                  @foreach($inmuebles as $inmueble)
                  <div class="col-11 col-sm-3 col-md-4">
                    <div class="card">
                      <img class='w-100' src="{{asset($inmueble->imagen)}}" alt="">
                      <div class="card-body">
                        <h4 class="card-title">{{$inmueble->nombre}}</h4>
                        <p class="card-text">{!!$inmueble->descripcion!!}</p>
                        <a href="/inmueble/{{$inmueble->id}}" class="btn btn-primary">Ver</a>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection