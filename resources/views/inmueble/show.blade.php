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
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <img class="card-img-top img-fluid w-100"  src="{{asset($inmueble->imagen)}}" alt="">
                        </div>
                        <div class="col-6">
                              <h6 class="card-title mb-1">
                                <a href="/inmueble/{!!$inmueble->id!!}">{{$inmueble->nombre}}</a>
                              </h6>
                              <p class="card-text small">Editar
                                <a href="/inmueble/{!!$inmueble->id!!}/edit">#surfsup</a>
                              </p>

                              <p class="card-text small">Eliminar
                                <a href="/inmueble/{!!$inmueble->id!!}/edit">#surfsup</a>
                              </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 m-t-20 m-b-20">
                  <div class="row">
                    @foreach($inmueble->ima as $elprodu)
                    <div class="col-4 m-t-20">
                      <img class="card-img-top w-100" src="{{asset($elprodu->imagen)}}" alt="">
                    </div>
                    @endforeach
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection