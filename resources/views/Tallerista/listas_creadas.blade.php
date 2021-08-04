@extends('layouts.app')

@section('content')

<br>
<br>
<br>
<br>


<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4>LISTAS CREADAS</h4>
        </div>
        <br>
        <section class="content">
            <div class="col-md-12">
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
        </section>
    </div>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="tabla_listas" name="tabla_listas">
                    <thead>
                        <tr>
                            <th>N° de lista</th>
                            <th>Id usuario</th>
                            <th>Fecha de creacion</th>
                            <th>Comentario</th>
                            <th>Imagen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lista as $l)
                            <tr class="post{{$l->id_lista}}" id="{{$l->id_lista}}">
                                <td>{{$l->id}}</td>
                                <td>{{$l->id_usuario_creado}}</td>
                                <td>{{$l->fecha_creacion}}</td>
                                <td>{{$l->comentario_lista}}</td>
                                <td><button class="btn btn-sm btn-success ver_imagen" data-imagen="{{$l->imagen_lista}}" type="button">Ver imagen</button></td>
                            </tr>             
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_imagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                    <img src="" id="lista_imagen" class="img-thumbnail img-fluid" alt="Ejemplo">
            </div>

            <div class="modal-footer">
                <button class="btn btn-warning" type="button" data-dismiss="modal">
                    Cerrar
                    <i class="fa fa-times-circle"></i>
                </button>
            </div>
        </div>
    </div>
</div> 

@endsection
