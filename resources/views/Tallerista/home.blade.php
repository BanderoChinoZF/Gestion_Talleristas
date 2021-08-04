@extends('layouts.app')

<link href="{{ asset('css/home.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <div class="row justify-content-center principal">
        <section class="content">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="container">
                <div class="row">
                    <div class="col-6" >
                        <button type="button" class="btn-circle btn-xl" >
                                                                
                        </button>
                        
                    </div>

                    <div class="col-6">
                        <button type="button" class="btn-circle btn-x2" disabled>
                            
                        </button>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-6 titulo-btn" >
                        ADMINISTRADOR
                    </div>

                    <div class="col-6 titulo-btn" >
                        RECURSOS HUMANOS
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <button type="button" class="btn-circle btn-x3" id="sesion_tallerist">
        
                        </button>
                    </div>
                </div>
            </div>  
            
            <div class="container">
                <div class="row">
                    <div class="col-6 titulo-btn" >
                        TALLERISTA
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
