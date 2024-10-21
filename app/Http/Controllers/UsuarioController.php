<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index(Request $request){
        // $modalidad = isset($request->modalidad) ? $request->modalidad : null;
        // $carrera = isset($request->carrera) ? $request->carrera : null;
        $estado = isset($request->estado) ? $request->estado : null;
        $prospecto = isset($request->prospecto) ? $request->prospecto : null;
        $inscripcion = isset($request->inscripcion) ? $request->inscripcion : null;
        $ficha = isset($request->ficha) ? $request->ficha : null;
        $estado = isset($request->estado) ? $request->estado : null;
        $dato = isset($request->dato) ? $request->dato : null;
        $interesado = isset($request->interesado) ? $request->interesado : null;
        $usuario = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->leftjoin('fichas', 'users.id', '=', 'fichas.user_id')
            // ->leftjoin('carreras', 'users.id_carrera', '=', 'carreras.id')
            ->select('users.*', 'fichas.id_estado_revision', 'carreras.nombre_corto', 
                    DB::raw("(SELECT pagos.id_estado_revision FROM pagos WHERE pagos.user_id=users.id AND (pagos.id_tipo_pago=3 OR pagos.id_tipo_pago=1) AND pagos.id_estado=1 ORDER BY FIELD(pagos.id_estado_revision, 3, 1, 2, 0) LIMIT 1) as prospecto"),
                    DB::raw("(SELECT pagos.id_estado_revision FROM pagos WHERE pagos.id_ficha=fichas.id AND (pagos.id_tipo_pago=3 OR pagos.id_tipo_pago=2) AND pagos.id_estado=1 ORDER BY FIELD(pagos.id_estado_revision, 3, 1, 2, 0) LIMIT 1) as inscripcion"),
                    'roles.id as id_role', 'roles.name as rol'
                )
            ->where('roles.id', 3)
            ->where('users.id_estado', 1);
        if (is_numeric($prospecto) && $prospecto==0) {
            $usuario=$usuario->havingRaw('prospecto is null');
        }elseif($prospecto>0 && $prospecto<5){
            $usuario=$usuario->having('prospecto', $prospecto);
        }
        if (is_numeric($inscripcion) && $inscripcion==0) {
            $usuario=$usuario->havingRaw('inscripcion is null');
        }elseif($inscripcion>0 && $inscripcion<5){
            $usuario=$usuario->having('inscripcion', $inscripcion);
        }
        if (is_numeric($ficha) && $ficha==0) {
            $usuario=$usuario->having('fichas.id_estado_revision', $ficha);
        }elseif($ficha>0 && $ficha<5){
            $usuario=$usuario->having('fichas.id_estado_revision', $ficha);
        }elseif(is_numeric($ficha) && $ficha==5){
            $usuario=$usuario->whereNull('fichas.id_estado_revision');
        }
        if ($estado && $estado==1) {
            $usuario=$usuario->whereNotNull('users.email_verified_at');
        }
        if ($estado && $estado==2) {
            $usuario=$usuario->whereNull('users.email_verified_at');
        }
        // if ($modalidad) {
        //     $usuario=$usuario->where('fichas.mcp_id_modalidad', $modalidad);
        // }
        // if ($carrera) {
        //     $usuario=$usuario->where('users.id_carrera', $carrera);
        // }
        if (is_numeric($interesado)) {
            $usuario=$usuario->where('users.interesado', $interesado);
        }
        $usuario=$usuario->where(function($query) use ($dato){
            $query->Where('fichas.id_estado', 1);
            $query->orWhere('fichas.id_estado', null);
        });
        if($dato){
            $usuario=$usuario->where(function($query) use ($dato){
            $query->Where('users.numero_documento', 'like', '%' . $dato . '%');
            $query->orWhere(DB::raw('concat(users.apellido_paterno, " ",users.apellido_materno," ", users.nombre)'), 'like', '%' . $dato . '%');
        });
        }        
        $usuario=$usuario->orderBy('users.created_at','desc')->get();

        //dd($usuario);

        return response()->json($usuario);
    }
}
