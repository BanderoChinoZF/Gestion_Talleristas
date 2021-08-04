<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tallerista;
use App\Models\Encuesta;
use App\Models\Respuestas;
use App\Models\Preguntas;
use App\Models\Datos;
use Illuminate\Support\Facades\DB;

class AdministradorController extends Controller
{
    public function index(){
        $da = Datos::orderBy('COL 2')->get();

        $id_listas = DB::select(DB::raw('
            SELECT DISTINCT id_lista 
            FROM encuesta
        '));              

        return view('Administrador.sesion', ['data'=>$da, 'sesiones'=>$id_listas]);
    }

    public function maestro(){
        $data = Datos::orderBy('COL 2')->get();

        $id_listas = DB::select(DB::raw('
            SELECT DISTINCT id_lista 
            FROM encuesta
        '));      

        return view('Maestro.home', ['data'=>$data, 'sesiones'=>$id_listas]);
    }

    public function getDatosTallerista($id, $id_lista){
        $preguntas = Preguntas::select('nombre_pregunta')->get();
        //$respuestas = Respuestas::select('respuesta')->get();

        if($id!=0 && $id_lista!=0){
            $res1 = DB::select(DB::raw('
                    SELECT
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=1 AND id_respuesta=1) AS "p1_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=1 AND id_respuesta=2) AS "p1_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=1 AND id_respuesta=3) AS "p1_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=1 AND id_respuesta=4) AS "p1_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=1 AND id_respuesta=5) AS "p1_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=2 AND id_respuesta=1) AS "p2_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=2 AND id_respuesta=2) AS "p2_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=2 AND id_respuesta=3) AS "p2_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=2 AND id_respuesta=4) AS "p2_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=2 AND id_respuesta=5) AS "p2_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=3 AND id_respuesta=1) AS "p3_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=3 AND id_respuesta=2) AS "p3_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=3 AND id_respuesta=3) AS "p3_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=3 AND id_respuesta=4) AS "p3_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=3 AND id_respuesta=5) AS "p3_r5",                
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=4 AND id_respuesta=1) AS "p4_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=4 AND id_respuesta=2) AS "p4_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=4 AND id_respuesta=3) AS "p4_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=4 AND id_respuesta=4) AS "p4_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=4 AND id_respuesta=5) AS "p4_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=5 AND id_respuesta=1) AS "p5_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=5 AND id_respuesta=2) AS "p5_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=5 AND id_respuesta=3) AS "p5_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=5 AND id_respuesta=4) AS "p5_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=5 AND id_respuesta=5) AS "p5_r5"
                ')
            );
        }
        else if($id!=0 && $id_lista==0){
            $res1 = DB::select(DB::raw('
                    SELECT
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=1 AND id_respuesta=1) AS "p1_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=1 AND id_respuesta=2) AS "p1_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=1 AND id_respuesta=3) AS "p1_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=1 AND id_respuesta=4) AS "p1_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=1 AND id_respuesta=5) AS "p1_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=2 AND id_respuesta=1) AS "p2_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=2 AND id_respuesta=2) AS "p2_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=2 AND id_respuesta=3) AS "p2_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=2 AND id_respuesta=4) AS "p2_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=2 AND id_respuesta=5) AS "p2_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=3 AND id_respuesta=1) AS "p3_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=3 AND id_respuesta=2) AS "p3_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=3 AND id_respuesta=3) AS "p3_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=3 AND id_respuesta=4) AS "p3_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=3 AND id_respuesta=5) AS "p3_r5",                
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=4 AND id_respuesta=1) AS "p4_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=4 AND id_respuesta=2) AS "p4_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=4 AND id_respuesta=3) AS "p4_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=4 AND id_respuesta=4) AS "p4_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=4 AND id_respuesta=5) AS "p4_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=5 AND id_respuesta=1) AS "p5_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=5 AND id_respuesta=2) AS "p5_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=5 AND id_respuesta=3) AS "p5_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=5 AND id_respuesta=4) AS "p5_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=5 AND id_respuesta=5) AS "p5_r5"
                ')
            );
        }
        else if($id==0 && $id_lista!=0){
            $res1 = DB::select(DB::raw('
                    SELECT
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=1 AND id_respuesta=1) AS "p1_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=1 AND id_respuesta=2) AS "p1_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=1 AND id_respuesta=3) AS "p1_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=1 AND id_respuesta=4) AS "p1_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=1 AND id_respuesta=5) AS "p1_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=2 AND id_respuesta=1) AS "p2_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=2 AND id_respuesta=2) AS "p2_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=2 AND id_respuesta=3) AS "p2_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=2 AND id_respuesta=4) AS "p2_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=2 AND id_respuesta=5) AS "p2_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=3 AND id_respuesta=1) AS "p3_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=3 AND id_respuesta=2) AS "p3_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=3 AND id_respuesta=3) AS "p3_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=3 AND id_respuesta=4) AS "p3_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=3 AND id_respuesta=5) AS "p3_r5",                
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=4 AND id_respuesta=1) AS "p4_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=4 AND id_respuesta=2) AS "p4_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=4 AND id_respuesta=3) AS "p4_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=4 AND id_respuesta=4) AS "p4_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=4 AND id_respuesta=5) AS "p4_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=5 AND id_respuesta=1) AS "p5_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=5 AND id_respuesta=2) AS "p5_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=5 AND id_respuesta=3) AS "p5_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=5 AND id_respuesta=4) AS "p5_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=5 AND id_respuesta=5) AS "p5_r5"
                ')
            );
        }
        else{
            $res1 = DB::select(DB::raw('
                    SELECT
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=1 AND id_respuesta=1) AS "p1_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=1 AND id_respuesta=2) AS "p1_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=1 AND id_respuesta=3) AS "p1_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=1 AND id_respuesta=4) AS "p1_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=1 AND id_respuesta=5) AS "p1_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=2 AND id_respuesta=1) AS "p2_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=2 AND id_respuesta=2) AS "p2_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=2 AND id_respuesta=3) AS "p2_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=2 AND id_respuesta=4) AS "p2_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=2 AND id_respuesta=5) AS "p2_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=3 AND id_respuesta=1) AS "p3_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=3 AND id_respuesta=2) AS "p3_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=3 AND id_respuesta=3) AS "p3_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=3 AND id_respuesta=4) AS "p3_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=3 AND id_respuesta=5) AS "p3_r5",                
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=4 AND id_respuesta=1) AS "p4_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=4 AND id_respuesta=2) AS "p4_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=4 AND id_respuesta=3) AS "p4_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=4 AND id_respuesta=4) AS "p4_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=4 AND id_respuesta=5) AS "p4_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=5 AND id_respuesta=1) AS "p5_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=5 AND id_respuesta=2) AS "p5_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=5 AND id_respuesta=3) AS "p5_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=5 AND id_respuesta=4) AS "p5_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=5 AND id_respuesta=5) AS "p5_r5"
                ')
            );
        }
        

        $res = (array) $res1[0];
        $data = [];
        $num = 1;

        foreach($preguntas as $pre){           
            $nuevo = [ 'pregunta'=>$pre->nombre_pregunta ]; 
            
            if(key_exists('p'.$num.'_r1',$res)) $nuevo['res_1'] = $res['p'.$num.'_r1'];
            if(key_exists('p'.$num.'_r2',$res)) $nuevo['res_2'] = $res['p'.$num.'_r2'];
            if(key_exists('p'.$num.'_r3',$res)) $nuevo['res_3'] = $res['p'.$num.'_r3'];
            if(key_exists('p'.$num.'_r4',$res)) $nuevo['res_4'] = $res['p'.$num.'_r4'];
            if(key_exists('p'.$num.'_r5',$res)) $nuevo['res_5'] = $res['p'.$num.'_r5'];
            if(key_exists('p'.$num.'_r6',$res)) $nuevo['res_6'] = $res['p'.$num.'_r6'];
            if(key_exists('p'.$num.'_r7',$res)) $nuevo['res_7'] = $res['p'.$num.'_r7'];
            if(key_exists('p'.$num.'_r8',$res)) $nuevo['res_8'] = $res['p'.$num.'_r8'];
            if(key_exists('p'.$num.'_r9',$res)) $nuevo['res_9'] = $res['p'.$num.'_r9'];
            if(key_exists('p'.$num.'_r10',$res)) $nuevo['res_10'] = $res['p'.$num.'_r10'];
            
            array_push($data, $nuevo);
            $num++;
        }
     
        return $data;
    }

    public function getDatosTallerista2($id){
        if($id==1){
            $data=[
                ['pregunta'=>'¿Pregunta 1?', 'res_1'=>'0', 'res_2'=>'39', 'res_3'=>'12', 'res_4'=>'21', 'res_5'=>'1',],
                ['pregunta'=>'¿Pregunta 2?', 'res_1'=>'0', 'res_2'=>'21', 'res_3'=>'15', 'res_4'=>'25', 'res_5'=>'2',],
                ['pregunta'=>'¿Pregunta 3?', 'res_1'=>'0', 'res_2'=>'41', 'res_3'=>'18', 'res_4'=>'10', 'res_5'=>'5',],
                ['pregunta'=>'¿Pregunta 4?', 'res_1'=>'0', 'res_2'=>'23', 'res_3'=>'35', 'res_4'=>'5', 'res_5'=>'13',],
                ['pregunta'=>'¿Pregunta 5?', 'res_1'=>'0', 'res_2'=>'22', 'res_3'=>'22', 'res_4'=>'11', 'res_5'=>'11',],
            ];
        }
        else{
            $data=[
                ['pregunta'=>'¿Pregunta 1?', 'res_1'=>'0', 'res_2'=>'23', 'res_3'=>'12', 'res_4'=>'23', 'res_5'=>'2',],
                ['pregunta'=>'¿Pregunta 2?', 'res_1'=>'0', 'res_2'=>'22', 'res_3'=>'11', 'res_4'=>'15', 'res_5'=>'5',],
                ['pregunta'=>'¿Pregunta 3?', 'res_1'=>'0', 'res_2'=>'43', 'res_3'=>'9', 'res_4'=>'23', 'res_5'=>'10',],
                ['pregunta'=>'¿Pregunta 4?', 'res_1'=>'0', 'res_2'=>'31', 'res_3'=>'32', 'res_4'=>'34', 'res_5'=>'19',],
                ['pregunta'=>'¿Pregunta 5?', 'res_1'=>'0', 'res_2'=>'33', 'res_3'=>'21', 'res_4'=>'31', 'res_5'=>'12',],
            ];
        }

        return json_encode(['data'=>$data]);
    }

    public function getDatosTallerista3($id, $id_lista){
        $preguntas = Preguntas::select('nombre_pregunta')->get();
        $respuestas = Respuestas::select('respuesta')->get();

        if($id!=0 && $id_lista!=0){
            $res1 = DB::select(DB::raw('
                    SELECT
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=1 AND id_respuesta=1) AS "p1_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=1 AND id_respuesta=2) AS "p1_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=1 AND id_respuesta=3) AS "p1_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=1 AND id_respuesta=4) AS "p1_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=1 AND id_respuesta=5) AS "p1_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=2 AND id_respuesta=1) AS "p2_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=2 AND id_respuesta=2) AS "p2_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=2 AND id_respuesta=3) AS "p2_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=2 AND id_respuesta=4) AS "p2_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=2 AND id_respuesta=5) AS "p2_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=3 AND id_respuesta=1) AS "p3_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=3 AND id_respuesta=2) AS "p3_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=3 AND id_respuesta=3) AS "p3_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=3 AND id_respuesta=4) AS "p3_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=3 AND id_respuesta=5) AS "p3_r5",                
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=4 AND id_respuesta=1) AS "p4_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=4 AND id_respuesta=2) AS "p4_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=4 AND id_respuesta=3) AS "p4_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=4 AND id_respuesta=4) AS "p4_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=4 AND id_respuesta=5) AS "p4_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=5 AND id_respuesta=1) AS "p5_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=5 AND id_respuesta=2) AS "p5_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=5 AND id_respuesta=3) AS "p5_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=5 AND id_respuesta=4) AS "p5_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_lista='.$id_lista.' AND id_pregunta=5 AND id_respuesta=5) AS "p5_r5"
                ')
            );
        }
        else if($id!=0 && $id_lista==0){
            $res1 = DB::select(DB::raw('
                    SELECT
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=1 AND id_respuesta=1) AS "p1_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=1 AND id_respuesta=2) AS "p1_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=1 AND id_respuesta=3) AS "p1_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=1 AND id_respuesta=4) AS "p1_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=1 AND id_respuesta=5) AS "p1_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=2 AND id_respuesta=1) AS "p2_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=2 AND id_respuesta=2) AS "p2_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=2 AND id_respuesta=3) AS "p2_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=2 AND id_respuesta=4) AS "p2_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=2 AND id_respuesta=5) AS "p2_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=3 AND id_respuesta=1) AS "p3_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=3 AND id_respuesta=2) AS "p3_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=3 AND id_respuesta=3) AS "p3_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=3 AND id_respuesta=4) AS "p3_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=3 AND id_respuesta=5) AS "p3_r5",                
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=4 AND id_respuesta=1) AS "p4_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=4 AND id_respuesta=2) AS "p4_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=4 AND id_respuesta=3) AS "p4_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=4 AND id_respuesta=4) AS "p4_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=4 AND id_respuesta=5) AS "p4_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=5 AND id_respuesta=1) AS "p5_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=5 AND id_respuesta=2) AS "p5_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=5 AND id_respuesta=3) AS "p5_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=5 AND id_respuesta=4) AS "p5_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND id_pregunta=5 AND id_respuesta=5) AS "p5_r5"
                ')
            );
        }
        else if($id==0 && $id_lista!=0){
            $res1 = DB::select(DB::raw('
                    SELECT
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=1 AND id_respuesta=1) AS "p1_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=1 AND id_respuesta=2) AS "p1_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=1 AND id_respuesta=3) AS "p1_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=1 AND id_respuesta=4) AS "p1_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=1 AND id_respuesta=5) AS "p1_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=2 AND id_respuesta=1) AS "p2_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=2 AND id_respuesta=2) AS "p2_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=2 AND id_respuesta=3) AS "p2_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=2 AND id_respuesta=4) AS "p2_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=2 AND id_respuesta=5) AS "p2_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=3 AND id_respuesta=1) AS "p3_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=3 AND id_respuesta=2) AS "p3_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=3 AND id_respuesta=3) AS "p3_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=3 AND id_respuesta=4) AS "p3_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=3 AND id_respuesta=5) AS "p3_r5",                
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=4 AND id_respuesta=1) AS "p4_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=4 AND id_respuesta=2) AS "p4_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=4 AND id_respuesta=3) AS "p4_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=4 AND id_respuesta=4) AS "p4_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=4 AND id_respuesta=5) AS "p4_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=5 AND id_respuesta=1) AS "p5_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=5 AND id_respuesta=2) AS "p5_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=5 AND id_respuesta=3) AS "p5_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=5 AND id_respuesta=4) AS "p5_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_lista='.$id_lista.' AND id_pregunta=5 AND id_respuesta=5) AS "p5_r5"
                ')
            );
        }
        else{
            $res1 = DB::select(DB::raw('
                    SELECT
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=1 AND id_respuesta=1) AS "p1_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=1 AND id_respuesta=2) AS "p1_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=1 AND id_respuesta=3) AS "p1_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=1 AND id_respuesta=4) AS "p1_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=1 AND id_respuesta=5) AS "p1_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=2 AND id_respuesta=1) AS "p2_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=2 AND id_respuesta=2) AS "p2_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=2 AND id_respuesta=3) AS "p2_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=2 AND id_respuesta=4) AS "p2_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=2 AND id_respuesta=5) AS "p2_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=3 AND id_respuesta=1) AS "p3_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=3 AND id_respuesta=2) AS "p3_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=3 AND id_respuesta=3) AS "p3_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=3 AND id_respuesta=4) AS "p3_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=3 AND id_respuesta=5) AS "p3_r5",                
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=4 AND id_respuesta=1) AS "p4_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=4 AND id_respuesta=2) AS "p4_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=4 AND id_respuesta=3) AS "p4_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=4 AND id_respuesta=4) AS "p4_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=4 AND id_respuesta=5) AS "p4_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=5 AND id_respuesta=1) AS "p5_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=5 AND id_respuesta=2) AS "p5_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=5 AND id_respuesta=3) AS "p5_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=5 AND id_respuesta=4) AS "p5_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_pregunta=5 AND id_respuesta=5) AS "p5_r5"
                ')
            );
        }

        $res = (array) $res1[0];
        $data = [];
        

        $res = (array) $res1[0];
        $data = [];
        $num = 1;

        foreach($preguntas as $pre){           
            $nuevo = [ 'pregunta'=>$pre->nombre_pregunta ]; 

            $num2 = 1;
            foreach($respuestas as $resp){
                if(key_exists('p'.$num.'_r'.$num2,$res)) $nuevo[$resp->respuesta] = $res['p'.$num.'_r'.$num2];
                $num2++;
            }            
            array_push($data, $nuevo);
            $num++;
        }

        return json_encode(['data'=>$data]);
    }
}
