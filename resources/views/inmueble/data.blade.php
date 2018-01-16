            <div class="col-11 col-sm-10 col-md-8 col-lg-7 p-t-30 p-b-30">
                <div class="row cambio justify-content-center align-items-center ">
                    @foreach($inmuebles as $inmueble)
                        <div class="col-11 col-sm-6 col-md-4 seleccion p-t-10 p-b-10 ">
                            <a data-fancybox data-type="ajax" data-src="ajaxDetalle/{{$inmueble->id}}" href="javascript:;">
                                <div class='al_100 img__wrap'>
                                    <img class="al_100" src="{{asset($inmueble->imagen)}}" data-idcate="{{$inmueble->id}}" class="d-block img-fluid">
                                    <div class="img__description_layer">
                                      <div class="img__description">
                                        <h3>{{$inmueble->nombre}}</h3>
                                      </div>
                                    </div>
                                </div>
                                <div class="alineado_izq descipciones">
                                    <h4 class='p-t-10 texto_light '>{{$inmueble->precio}}</h4>
                                    <h5 class='texto_bold'>{{$inmueble->nombre}}</h5>
                                    <p>{{substr(strip_tags($inmueble->descripcion),0,80)}}{{strlen(strip_tags($inmueble->descripcion)) > 80 ? "...":""}}</p>
                                </div>
                            </a>
                        </div>

                    @endforeach
                </div>
            </div>

            <div class="col-7 alineado_der">
                    {{$inmuebles->render()}}
            </div>
