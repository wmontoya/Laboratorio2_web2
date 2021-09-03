<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class ControladorInicioSesion extends Controller
{
    public function iniciar_sesion(Request $request){
        $user = $request->input('txt_user');
        $pass = $request->input('txt_pass');

        $consulta = DB::table('tbl_usuarios')->where([
            ['nombre','=',$user],
            ['pass','=',$pass]
        ])->first();
        
        if($user != NULL && $pass != NULL){
            if($consulta != NULL){
                $request->session()->put('id',$consulta->id_usuario);
                $request->session()->put('usuario',$consulta->nombre);
                return $this->cargar_mensajes($request);
            }
            else {
                return view('plantillas.inicio_sesion', ['mensaje'=>'Error al iniciar sesion, usuario no encontrado']);
            }
        }
        else {
            return view('plantillas.inicio_sesion', ['mensaje'=>'Ingresar los valores requeridos: Usuario, Clave']);
        }
    }
    public function cargar_mensajes(Request $request){
        $consulta = DB::table('tbl_mensajes')
                            ->join('tbl_usuarios','tbl_mensajes.id_usuario','=','tbl_usuarios.id_usuario')
                            ->select('tbl_mensajes.*','tbl_usuarios.nombre')
                            ->orderBy('tbl_mensajes.id_mensaje', 'desc')
                            ->get();
        $usuario = $request->session()->get("usuario");

        return view('plantillas.posts',['usuario'=>$usuario, 'posts'=>$consulta]);
    }
    public function crear_mensaje(Request $request){
        date_default_timezone_set("America/Costa_Rica");
        $post = $request->input('txt_post');
        $id_usuario = $request->session()->get('id');
        $fecha = (new \DateTime())->format('d-m-Y H:i:s');

        DB::table('tbl_mensajes')
                            ->insert(['id_usuario'=>$id_usuario,
                                      'mensaje'=>$post,
                                      'fecha'=>$fecha]);

        return $this->cargar_mensajes($request);
    }

    public function cerrar_session(Request $request){
        $request->session()->flush();
        return redirect('/');;
    }
}