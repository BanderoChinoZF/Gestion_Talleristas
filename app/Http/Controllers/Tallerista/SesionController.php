<?php

namespace App\Http\Controllers\Tallerista;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tallerista;
use App\Models\lista_tallerista;
use App\Models\lista;
use App\Models\encuesta;
use App\Models\respuesta;
use App\Models\Datos;

class SesionController extends Controller
{
    public function index(){
        return view('Tallerista.sesion'); 
    }

    public function buscar($id){
        $tallerista = Datos::where('id_empleado','=',$id)->first();
        //$tallerista=tallerista::find($id);
        return $tallerista;
    }

    public function insertar_lista_tallerista(Request $request){
        $lista_tallerista= new lista_tallerista;

        $lista_tallerista->id_lista=$request->input('id_lista');
        $lista_tallerista->id_tallerista=$request->input('id_tallerista');
        $lista_tallerista->save();

        $tallerista= tallerista::find($request->id_tallerista);
        $tallerista->lista_asignada='1';
        $tallerista->save();
    
        return response()->json($lista_tallerista);
    }

    //--------------------------------------------------------------------------------------------
    public function insertar_lista(Request $request){
        $lista = new lista;

        $lista->id_usuario_creado=$request->input('id_usuario_creado');
        $lista->fecha_creacion=date('Y-m-d');
        $lista->save();

       return response()->json($lista);
    }
    
    //-----------------------------------------------------------------------------------------------------
    public function mostrar_lista_usuario($id_usuario){
        $lista_usuario=lista::where('id_usuario_creado','=',$id_usuario)->get();
        return view('Tallerista.listas_creadas')->with('lista',$lista_usuario);      
    }

    //------------------------------------------------------------------------------------------------------
    public function mostrar_lista_usuario_detalle($id_usuario){
        $lista_usuario=lista::where('id_usuario_creado','=',$id_usuario)->get();
        return view('Tallerista.listas_creadas_detalle')->with('lista',$lista_usuario);      
    }


    //---------------------------------------------------------------------------------------------------------------------
    public function mostrar($id_lista){
        $lista_tallerista=lista_tallerista::join('tallerista','lista_tallerista.id_tallerista','=','tallerista.id')
        ->join('lista','lista.id','lista_tallerista.id_lista')
        ->where('id_lista','=',$id_lista)->get();
       
        $lista_tallerista2=lista::where('id','=',$id_lista)->get();
        
       return view('Tallerista.detalle_lista')->with('lista',$lista_tallerista)->with('lista2',$lista_tallerista2); 
    }

    //-------------------------------------------------------------
    public function obtener_ultimo(){
        $id_lista=lista::latest('id')->first();
        $id=1;
        if($id_lista!=null){
            $id = $id_lista->id+1;
        }
        return $id;
    }

    public function obtener_ultima_respuesta(){
        $id_respuesta=respuesta::latest('id')->first();
        $id=1;
        if($id_respuesta!=null){
            $id = $id_respuesta->id+1;
        }
        return $id;
    }

    public function insertar_respuesta(Request $request){
        $encuesta = new encuesta;

        $encuesta->id_tallerista=$request->input('id_tallerista');
        $encuesta->id_lista=$request->input('id_lista');
        $encuesta->id_pregunta=$request->input('id_pregunta');
        $encuesta->id_respuesta=$request->input('id_respuesta');
        $encuesta->save();

        if($request->input('id_pregunta')==4){
            $respuesta = new respuesta;
            $respuesta->respuesta=$request->input('valor_respuesta');
            $respuesta->save();
        }

        $tallerista= tallerista::find($request->id_tallerista);
        $tallerista->encuesta_realizada='1';
        $tallerista->save();

        return response()->json($encuesta);

    }

    public function actualizar_lista(Request $request){
        $lista=lista::where('id','=',$request->input('id_lista'))->first();

        $imagen=$request->file('imagen');
		$nombre_imagen=time().$imagen->getClientOriginalName();
		$imagen->move(public_path().'/img/',$nombre_imagen);

        $lista->imagen_lista=$nombre_imagen;
        $lista->comentario_lista=$request->input('comentario_lista');
        $lista->lista_completada='1';
        $lista->save();

        return view('Tallerista.sesion');
    }
}
