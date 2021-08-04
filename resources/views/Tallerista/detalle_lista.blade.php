@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center principal">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        LISTAS CREADAS
                    </h4>
                    <div class="card-tools">
                        <div class="input-group input-group-md" style="width: 350px;">
                            <input type="text" id="buscar_lista" name="buscar_lista" class="form-control float-right" placeholder="Buscar">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                                 <a title="Inicio" href="{{url('Tallerista/index')}}" class="btn btn-sm btn-dark">
                                    <i class="fas fa-home"></i>
                                 </a>

                            </div>
                        </div>
                    </div>
                </div>

                <form class="form-horizontal" action="{{url('Tallerista/actualizar_lista')}}" method="post" enctype="multipart/form-data">        
                    @csrf
                    <div class="card-body">

                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">

                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover text-nowrap" id="tabla_listas" name="tabla_listas">
                                                <thead>
                                                    <tr>
                                                        <th>N° de lista</th>
                                                        <th>Id tallerista</th>
                                                        <th>Encuesta</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($lista as $l)
                                                        <input type="text" value="{{$l->id_lista}}" name="id_lista" hidden>
                                                        <tr class="post{{$l->id_lista}}" id="fila_detalle">
                                                            <td>{{$l->id_lista}}</td>
                                                            <td>{{$l->id_tallerista}}</td>
                                                            <td>
                                                                @if ($l->encuesta_realizada==0)
                                                                    <button type="button" data-id-lista="{{$l->id_lista}}" data-id-tallerista="{{$l->id_tallerista}}" class="btn btn-sm btn-warning responder_preguntas">Por resolver</button>
                                                                    <i class="fas fa-clipboard-list"></i>
                                                                @else
                                                                <button type="button" data-id-tallerista="{{$l->id_tallerista}}" class="btn btn-sm btn-success responder_preguntas" disabled>Resuelta</button>
                                                                <i class="fas fa-clipboard-list"></i>
                                                                @endif
                                                                
                                                            </td> 
                                                        </tr>             
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->

                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-header">
                        
                            @foreach ($lista2 as $l2)

                                @if ($l2->lista_completada==0)
                                    <div class="form-group">
                                        <input type="file" id="file" name="imagen" accept="image/*" value="">
                                            <i class="fas fa-image"></i>
                                    </div>

                                    <div class="form-group">
                                        <label for="comentario">Comentario</label>
                                        <textarea class="form-control" name="comentario_lista" id="comentario_lista" rows="2"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" id="" class="btn btn-md btn-primary">
                                            Guardar <i class="fas fa-save"></i>
                                        </button>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <input type="file" id="file" name="imagen" accept="image/*" value="" disabled>
                                            <i class="fas fa-image"></i>
                                    </div>

                                    <div class="form-group">
                                        <label for="comentario">Comentario</label>
                                        <textarea class="form-control" name="comentario_lista" id="comentario_lista" rows="2" disabled></textarea>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" id="" class="btn btn-md btn-primary" disabled>
                                            Guardar <i class="fas fa-save"></i>
                                        </button>
                                    </div>
                                @endif
                                

                             @endforeach

                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_preguntas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Preguntas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" id="form" role="form">
                    @csrf

                    <input type="text" name="id_tallerista" id="id_tallerista" hidden>
                    <input type="text" name="id_lista" id="id_lista" hidden>

                    <div class="form-group">
                        <label for="sexo">1.- ¿Consideras que los objetivos del taller se cumplierón?</label>
                        <div class="radio tipo1">
                            <label>
                              <input type="radio" name="pregunta1" value="1">
                              Totalmente de acuerdo 
                              <i class="fas fa-grin-alt"></i>
                            </label>
                        </div>

                        <div class="radio tipo1">
                            <label>
                              <input type="radio" name="pregunta1"  value="2">
                              De acuerdo <i class="fas fa-smile-wink"></i>
                            </label>
                        </div>

                        <div class="radio tipo1">
                            <label>
                              <input type="radio" name="pregunta1"  value="3">
                              Indeciso <i class="fas fa-grin-beam-sweat"></i>
                            </label>
                        </div>

                        <div class="radio tipo1">
                            <label>
                              <input type="radio" name="pregunta1"  value="4">
                              En desacuerdo<i class="fas fa-meh-rolling-eyes"></i>
                            </label>
                        </div>

                        <div class="radio tipo1">
                            <label>
                              <input type="radio" name="pregunta1"  value="5">
                              Totalmente en desacuerdo<i class="fas fa-sad-tear"></i>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sexo">2.- ¿Cómo calificarias la información recibida durante el taller?</label>
                        <div class="radio2">
                            <label>
                              <input type="radio" name="pregunta2"  value="1">
                              Muy importante
                            </label>
                            <i class="fas fa-grin-alt"></i>
                        </div>

                        <div class="radio2">
                            <label>
                              <input type="radio" name="pregunta2"  value="2">
                              Importante
                            </label>
                            <i class="fas fa-smile-wink"></i>
                        </div>

                        <div class="radio2">
                            <label>
                              <input type="radio" name="pregunta2"  value="3">
                              Moderadamente importante<i class="fas fa-grin-beam-sweat"></i>
                            </label>
                        </div>

                        <div class="radio2">
                            <label>
                              <input type="radio" name="pregunta2"  value="4">
                              De poca importancia<i class="fas fa-meh-rolling-eyes"></i>
                            </label>
                        </div>

                        <div class="radio2">
                            <label>
                              <input type="radio" name="pregunta2"  value="5">
                              Sin importancia<i class="fas fa-sad-tear"></i>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sexo">3.- ¿Cómo calificarias las dinámicas que se realizaron durante el taller?</label>
                        <div class="radio3">
                            <label>
                              <input type="radio" name="pregunta3"  value="1">
                              Totalmente de acuerdo 
                              <i class="fas fa-grin-alt"></i>
                            </label>
                        </div>

                        <div class="radio3">
                            <label>
                              <input type="radio" name="pregunta3"  value="2">
                              De acuerdo <i class="fas fa-smile-wink"></i>
                            </label>
                        </div>

                        <div class="radio3">
                            <label>
                              <input type="radio" name="pregunta3"  value="3">
                              Indeciso <i class="fas fa-grin-beam-sweat"></i>
                            </label>
                        </div>

                        <div class="radio3">
                            <label>
                              <input type="radio" name="pregunta3" value="4">
                              En desacuerdo<i class="fas fa-meh-rolling-eyes"></i>
                            </label>
                        </div>

                        <div class="radio3">
                            <label>
                              <input type="radio" name="pregunta3" value="5">
                              Totalmente en desacuerdo<i class="fas fa-sad-tear"></i>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sexo">4.- Del taller en general,¿con qué te quedas?¿cómo lo usarás en tu vida cotidiana?</label>
                        <input class="form-control" type="text" name="pregunta_abierta" id="pregunta_abierta">                        
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-success" type="submit" id="guardar_respuesta">
                    Enviar
                    <i class="fa fa-save"></i>
                </button>
                <button class="btn btn-warning" type="button" data-dismiss="modal">
                    Cerrar
                    <i class="fa fa-times-circle"></i>
                </button>
            </div>
        </div>
    </div>
</div> 

@endsection