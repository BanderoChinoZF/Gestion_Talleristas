@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
            <br>
            <br>
            <br>
            <section class="content">
                <div class="container-fluid">
                    <h5 class="text-center display-4">Buscar</h5>
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <form action="simple-results.html">
                                <div class="input-group">
                                    <input type="text" name="id_tallerista" class="form-control form-control-lg" placeholder="Ingresa el id">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-secondary fa-x3" id="buscar_tallerista">
                                            <i class="fas fa-search"></i>   Buscar
                                        </button>
                                        <a title="Listas creadas" href="{{url('Tallerista/mostrar_lista_usuario/'.Auth::user()->id)}}" class="btn btn-info fa-x3">
                                            <i class="fas fa-list"> Sesiones Creadas</i>
                                        </a>
                                            <!--<a title="Inicio" href="{{url('home')}}" class="btn btn-sm btn-dark">
                                                <i class="fas fa-home"></i>
                                            </a> -->
                                        <input type="text" value="{{Auth::user()->id}}" hidden>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <br> 
    <br>
    <div class="row text-center">
        <div class="col-md-12">
            <h2>Participante</h2>
            <div class="table-responsive p-0" style="height: 180px;">
                <table id="tabla_tallerista" class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Lugar</th>
                            <th>Departamento</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row text-center">
        <div class="col-md-12">
            <div class="card-header">
                <button type="button" class="btn btn-md btn-info" id="buscar_tallerista">
                    PDF <i class="fas fa-file-pdf"></i>
                </button>

                <button type="button" class="btn btn-md btn-success" id="buscar_tallerista">
                    EXCEL <i class="far fa-file-excel"></i>
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table id="tabla_lista" class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Lugar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->                     
                
            <div class="card-header">
                <input type="text" id="id_usuario_creado" name="id_usuario" value="{{Auth::user()->id}}" hidden>
                </input>
                <button type="button" id="guardar_lista" class="btn btn-md btn-primary">
                    Guardar <i class="far fa-save"></i>
                </button>
                
            </div>

        </div>
    </div>
</div>
@endsection

@section('footer')

<footer class="bg-light text-center text-white">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">Fresnillo</a>
    </div>
    <!-- Copyright -->
</footer>

@endsection
