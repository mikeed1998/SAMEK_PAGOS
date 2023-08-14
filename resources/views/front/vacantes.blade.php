@extends('layouts.front')

@section('title', 'Servicios')
@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
 <!-- Pagina Vacantes -->

 <style>
.Vacantes-Seccion2{
    background-image: url({{ asset('img/photos/seccions/'.$elements[1]->imagen)}});
}
 </style>
            <!-- SECCION 1 -->
    <div class="index" style="background: #F7F7F7;">

            <div class="seccion1Vacantes" style="padding: 0;">
                <div class="contenetBorder" style="height: 288px;">
                    <div class="tituloSeccion2">
                        <h1>VACANTES DISPONIBLES</h1>
                        <div class="contLinSec21 my-2">
                            <div class="contLinSec2">
                                <div class="linSec2"></div><img src="{{asset('img/design/iconDiaman.png')}}" alt=""><div class="linSec2"></div>
                            </div>    
                        </div>
                    </div>
                    
            <div class="textSeccion2 mb-5 mt-3">
                <p>{!!$elements[0]->texto!!}</p>
            </div>
                </div>
            </div>

            
            <!-- SECCION 1 -->

            <div class="Vacantes-Seccion2 mt-5"></div>
            
            <!-- SECCION 2 -->
            <div class="Vacantes-Seccion3">
                <div class="cont1-Vacantes-Seccion3">
                    <!-- CARD -->
                    
                    @foreach ($vacantes as $vac)
                        
                    
                    <div class="Cont-Cads-Vac-Sec3">
                        <div class="Head-Card-Vac-Sec3 mb-2">
                            @if (!empty($vac->portada))
                            <img src="{{ asset('img/photos/vacantes/'.$vac->portada)}}" alt="" > 
                            @else
                            <img src="{{ asset('img/design/img2.png')}}" alt="">
                            @endif
                        </div>
                        <div class="Cont-Titulo-cards-vac-sec3">
                            <h1>{{$vac->titulo}}</h1>
                            <div class="LineRVacantes my-1"></div>
                            <p>{{$vac->subtitulo}}</p>
                        </div>
                        <div class="Cont-Menu-Cards-Sec3">
                            <ul class="Ulfather">
                                <div class="accordion" id="">                                    
                                    <div class="accordion-item">
                                      <h2 class="accordion-header" id="oferta-{{$vac->id}}">
                                        <button class="accordion-button py-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#oferta{{$vac->id}}" aria-expanded="false" aria-controls="oferta{{$vac->id}}" style="font-weight: bold">
                                            OFERTA
                                        </button>
                                      </h2>
                                      <div id="oferta{{$vac->id}}" class="accordion-collapse collapse" aria-labelledby="oferta-{{$vac->id}}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="Cont-Vac-Ofert">
                                                <div>{!!$vac->oferta!!}
                                                    </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="requisitos-{{$vac->id}}">
                                          <button class="accordion-button py-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#requisitos{{$vac->id}}" aria-expanded="false" aria-controls="requisitos{{$vac->id}}" style="font-weight: bold">
                                            REQUISITOS
                                          </button>
                                        </h2>
                                        <div id="requisitos{{$vac->id}}" class="accordion-collapse collapse" aria-labelledby="requisitos-{{$vac->id}}" data-bs-parent="#accordionExample">
                                          <div class="accordion-body" style="font-size: .95em;">
                                            @foreach ($vac->requisitos=explode(";",$vac->requisitos) as $item)
                                        <li class="liChild"><i class="far fa-check-circle"></i>
                                            {{$item}}
                                        </li>@endforeach
                                          </div>
                                        </div>
                                      </div>
                                      <div class="accordion-item">
                                        <h2 class="accordion-header" id="vacantes-{{$vac->id}}">
                                          <button class="accordion-button py-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#vacantes{{$vac->id}}" aria-expanded="false" aria-controls="vacantes{{$vac->id}}" style="font-weight: bold">
                                            VACANTES
                                          </button>
                                        </h2>
                                        <div id="vacantes{{$vac->id}}" class="accordion-collapse collapse" aria-labelledby="vacantes{{$vac->id}}" data-bs-parent="#accordionExample">
                                          <div class="accordion-body">
                                            <div class="Cont-Vac-VacDisp">{{$vac->vacantesdisp}}</div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="accordion-item">
                                        <h2 class="accordion-header" id="salario-{{$vac->id}}">
                                          <button class="accordion-button py-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#salario{{$vac->id}}" aria-expanded="false" aria-controls="salario{{$vac->id}}" style="font-weight: bold">
                                            SALARAIO
                                          </button>
                                        </h2>
                                        <div id="salario{{$vac->id}}" class="accordion-collapse collapse" aria-labelledby="salario{{$vac->id}}" data-bs-parent="#accordionExample">
                                          <div class="accordion-body">
                                            <div class="Cont-Vac-Salario">{{$vac->salario}}</div>
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                                {{-- <li class="Lifather"><div class="Cont-Div-Li-Sec3 ps-2">OFERTA<button onclick="Vdesplegable(1)"><i class="fas fa-chevron-up"></i></button></div>
                                    <ul id="children" class="children">
                                        <div class="Cont-Vac-Ofert">
                                            <div>{!!$vac->oferta!!}
                                                </div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="Lifather"><div class="Cont-Div-Li-Sec3 ps-2">REQUISITOS<button onclick="Vdesplegable()"><i class="fas fa-chevron-up"></i></button></div>
                                    <ul id="children2" class="children">
                                        @foreach ($vac->requisitos=explode(";",$vac->requisitos) as $item)
                                        <li class="liChild"><i class="far fa-check-circle"></i><p>
                                            {{$item}}
                                        </p></li>@endforeach
                                    </ul></li>
                                <li class="Lifather"><div class="Cont-Div-Li-Sec3 ps-2">VACANTES DISPONIBLES<button onclick="Vdesplegable(1)"><i class="fas fa-chevron-up"></i></button></div>
                                    <ul id="children" class="children">
                                        <div class="Cont-Vac-VacDisp">{{$vac->vacantesdisp}}</div>
                                    </ul></li>
                                <li class="Lifather"><div class="Cont-Div-Li-Sec3 ps-2">SALARIO<button onclick="Vdesplegable(1)"><i class="fas fa-chevron-up"></i></button></div>
                                    <ul id="children" class="children">
                                        <div class="Cont-Vac-Salario">{{$vac->salario}}</div>
                                    </ul></li> --}}
                            </ul>
                        </div>
                        <div>
                            <div class="Cont-Button-Cards-sec3">
                                <a target="_blank" href="https://wa.me/52{{$config->whatsapp}}?text=Hola! estoy interesado en la vacante de {{$vac->titulo}}"><button style="background-color: black; color: white;">APLICAR</button></a>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    <!-- CARD -->




                </div>
            </div>
            <!-- SECCION 2 -->

            <!-- SECCION 3 -->

            <!-- SECCION 3 -->

        <!-- Pagina Vacantes -->
@endsection


