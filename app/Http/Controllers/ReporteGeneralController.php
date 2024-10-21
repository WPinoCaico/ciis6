<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteGeneralController extends Controller
{
    // Función para Reporte General
    public function index(Request $request){
        // INDICADORES DE PROCESO
        // Postulantes Pendientes Validar
        $canPendientes = DB::table('fichas')
            ->where('fichas.id_estado_revision', 1);        
        $canPendientes = $canPendientes
            ->count();
        // Postulantes en Proceso
        $canPreInscritos = DB::table('fichas')
            ->where('fichas.id_estado', 1);
        $canPreInscritos = $canPreInscritos
            ->whereNotIn('fichas.id_estado_revision', [3])
            ->count();
        // Postulantes Inscritos Validados
        $canInscritos = DB::table('fichas')
            ->where('fichas.id_estado_revision', 3);
        $canInscritos = $canInscritos
            ->count();
        // Postulantes Totales con fichas entre Validados y en Proceso
        $totalProceso = DB::table('fichas')
            ->join('modalidades', 'fichas.mcp_id_modalidad', '=', 'modalidades.id');        
        $totalProceso = $totalProceso
            ->count();
        // INDICADORES DE CANTIDAD
        // Cantidad de Prospectos Vendidos
        $canProspecto = DB::table('pagos')
            ->join('fichas', 'pagos.id_ficha', '=', 'fichas.id')
            ->where('pagos.id_estado_revision', 3);
        $canProspecto = $canProspecto
            ->whereIn('pagos.id_tipo_pago', [1, 3])
            ->count();
        // Cantidad de ventas de Derecho de Examen de Postulantes de colegio Público
        $canExamPubl = DB::table('colegios')
            ->join('fichas', 'colegios.id_colegio', '=', 'fichas.diep_id_colegio')
            ->join('pagos', 'fichas.id', '=', 'pagos.id_ficha')
            ->whereIn('colegios.gestion', [1, 2])
            ->where('pagos.id_estado_revision', 3)
            ->whereIn('pagos.id_tipo_pago', [2, 3, 5,6]);
        $canExamPubl = $canExamPubl
            ->count();
        // Cantidad de ventas de Derecho de Examen de Postulantes de colegio Privado
        $canExamPriv = DB::table('colegios')
            ->join('fichas', 'colegios.id_colegio', '=', 'fichas.diep_id_colegio')
            ->join('pagos', 'fichas.id', '=', 'pagos.id_ficha')
            ->where('colegios.gestion', 3)
            ->where('pagos.id_estado_revision', 3)
            ->whereIn('pagos.id_tipo_pago', [2, 3, 5, 6]);
        $canExamPriv = $canExamPriv
            ->count();
        // Total de Postulantes que han Pagado su Derecho de Examen tanto de colégio Público cómo Privado
        $canPagoInscripcion = DB::table('pagos')
            ->join('fichas', 'pagos.id_ficha', '=', 'fichas.id')
            ->where('pagos.id_estado_revision', 3);
        $canPagoInscripcion = $canPagoInscripcion
            ->whereIn('pagos.id_tipo_pago', [2, 3, 5, 6])
            ->count();
        // INDICADORES ECONÓMICOS
        // Monto de los Pagos por Prospecto
        $pagoProspectos = DB::table('pagos')
            ->join('fichas', 'pagos.id_ficha', '=', 'fichas.id')
            ->where('pagos.id_estado_revision', 3)
            ->whereIn('pagos.id_tipo_pago', [1, 3]);
        $pagoProspectos = $pagoProspectos
            ->count() * 50;
        $pagoProspectos = number_format($pagoProspectos, 2, '.', ',');
        // Monto de los Pagos por Derecho de Examen de Colegio Público
        $pagoExamPublico = DB::table('colegios')
            ->join('fichas', 'colegios.id_colegio', '=', 'fichas.diep_id_colegio')
            ->join('pagos', 'fichas.id', '=', 'pagos.id_ficha')
            ->whereIn('colegios.gestion', [1, 2])
            ->where('pagos.id_estado_revision', 3)
            ->whereIn('pagos.id_tipo_pago', [2, 3, 5 , 6]);
        $pagoExamPublico = $pagoExamPublico
            ->selectRaw('SUM(
                CASE
                    WHEN pagos.id_tipo_pago = 3 THEN pagos.monto_pago - 50
                    ELSE pagos.monto_pago
                END
            ) as pagoExamPublico')
            ->first();
        $pagoExamPublico = number_format($pagoExamPublico->pagoExamPublico, 2, '.', ',');
        // Monto de los Pagos por Derecho de Examen de Colegio Privado
        $pagoExamPrivado = DB::table('colegios')
            ->join('fichas', 'colegios.id_colegio', '=', 'fichas.diep_id_colegio')
            ->join('pagos', 'fichas.id', '=', 'pagos.id_ficha')
            ->where('colegios.gestion', 3)
            ->where('pagos.id_estado_revision', 3)
            ->whereIn('pagos.id_tipo_pago', [2, 3, 5, 6]);
        $pagoExamPrivado = $pagoExamPrivado
            ->selectRaw('SUM(
                CASE
                    WHEN pagos.id_tipo_pago = 3 THEN pagos.monto_pago - 50
                    ELSE pagos.monto_pago
                END
            ) as pagoExamPrivado')
            ->first();
        $pagoExamPrivado = number_format($pagoExamPrivado->pagoExamPrivado, 2, '.', ',');
        // Monto Total de la venta por Derecho de Examen
        $pagoTotal = DB::table('pagos')
            ->join('fichas', 'pagos.id_ficha', '=', 'fichas.id')
            ->where('pagos.id_estado_revision', 3);
        $pagoTotal = $pagoTotal
            ->sum('pagos.monto_pago');
        $pagoTotal = number_format($pagoTotal, 2, '.', ',');
        // REPORTE GENERAL
        $canUsuarios = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->where('model_has_roles.role_id', 3)
            ->where('users.interesado', 1)
            ->where('users.id_estado', 1)
            ->count();
        $reporteGeneral[0] = [
            'nombre' => 'USUARIOS REGISTRADOS',
            'cantidad' => $canUsuarios,
            'porcentaje' => (100 / 400) * $canUsuarios
        ];
        $reporteGeneral[1] = [
            'nombre' => 'PROSPECTO VENDIDO',
            'cantidad' => $canProspecto,
            'porcentaje' => (100 / 400) * $canProspecto
        ];
        $reporteGeneral[2] = [
            'nombre' => 'PAGOS POR INSCRIPCIÓN',
            'cantidad' => $canPagoInscripcion,
            'porcentaje' => (100 / 400) * $canPagoInscripcion
        ];
        $reporteGeneral[3] = [
            'nombre' => 'USUARIOS PRE-INSCRITOS',
            'cantidad' => $canPreInscritos,
            'porcentaje' => (100 / 400) * $canPreInscritos
        ];
        $reporteGeneral[4] = [
            'nombre' => 'POSTULANTES INSCRITOS',
            'cantidad' => $canInscritos,
            'porcentaje' => (100 / 400) * $canInscritos
        ];
        $reporteGeneral[5] = [
            'nombre' => 'POSTULANTES PENDIENTE A VALIDACIÓN',
            'cantidad' => $canPendientes,
            'porcentaje' => (100 / 400) * $canPendientes
        ];
        //REPORTE POR FECHA
        $canUsuariosDia = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('fichas', 'users.id', '=', 'fichas.user_id')
            ->where('model_has_roles.role_id', 3)
            ->where('users.id_estado', 1)
            ->whereNotNull('fichas.mcp_id_modalidad')
            ->select(DB::raw("DATE_FORMAT(users.created_at,'%Y-%m-%d') AS x"), DB::raw("COUNT(users.id) AS y"))
            ->groupBy('x')
            ->get();
        $canProspectoDia = DB::table('pagos')
            ->join('fichas', 'pagos.id_ficha', '=', 'fichas.id')
            ->where('pagos.id_estado_revision', 3)
            ->whereNotNull('fichas.mcp_id_modalidad', )
            ->whereIn('pagos.id_tipo_pago', [1, 3])
            ->select(DB::raw("DATE_FORMAT(pagos.fecha_revisado,'%Y-%m-%d') AS x"), DB::raw("COUNT(pagos.id) AS y"))
            ->groupBy('x')
            ->get();
        $canInscritosDia = DB::table('fichas')
            ->where('fichas.id_estado_revision', 3)
            ->whereNotNull('fichas.mcp_id_modalidad')
            ->select(DB::raw("DATE_FORMAT(fichas.fecha_revisado,'%Y-%m-%d') AS x"), DB::raw("COUNT(fichas.id) AS y"))
            ->groupBy('x')
            ->get();
        $canUsuariosDia = $this->completar_fechas('2023-09-10', $canUsuariosDia);
        $canProspectoDia = $this->completar_fechas('2023-09-10', $canProspectoDia);
        $canInscritosDia = $this->completar_fechas('2023-09-10', $canInscritosDia);
        $dia['canUsuariosDia'] = $canUsuariosDia;
        $dia['canProspectosDia'] = $canProspectoDia;
        $dia['canInscritosDia'] = $canInscritosDia;
        // REPORTE POR MODALIDADES
        $canModalidad_a = DB::table('fichas AS f')
            ->join('modalidades AS m', 'f.mcp_id_modalidad', '=', 'm.id')
            ->whereNotNull('f.mcp_id_modalidad')
            ->select(
                DB::raw("(SELECT 'TOTAL') AS modalidad"),
                DB::raw("COUNT(m.id) AS total"),
                DB::raw("COUNT(IF(f.id_estado_revision=3, 1, NULL)) AS inscritos"),
                DB::raw("COUNT(IF(f.id_estado_revision!=3, 1, NULL)) AS proceso")
            );
        $canModalidad = DB::table('fichas AS f')
            ->join('modalidades AS m', 'f.mcp_id_modalidad', '=', 'm.id')
            ->whereNotNull('f.mcp_id_modalidad')
            ->select(
                'm.modalidad',
                DB::raw("COUNT(m.id) AS total"),
                DB::raw("COUNT(IF(f.id_estado_revision=3, 1, NULL)) AS inscritos"),
                DB::raw("COUNT(IF(f.id_estado_revision!=3, 1, NULL)) AS proceso")
            )
            ->groupBy('m.id')
            ->union($canModalidad_a)
            ->get();
        if ($canUsuarios == null) {
            return response()->json(0);
        } else {
            return response()->json([
                // Llamado a la variable de instancia para que se retorne
                // Variables de instancia de Indicadores de Proceso
                'modalidades' => $canModalidad,
                'canPendientes' => $canPendientes,
                'canPreInscritos' => $canPreInscritos,
                'canInscritos' => $canInscritos,
                'totalProceso' => $totalProceso,
                'canUsuarios' => $canUsuarios,
                // Variables de instancia de Indicadores de Cantidad
                'canProspecto' => $canProspecto,
                'canExamPubl' => $canExamPubl,
                'canExamPriv' => $canExamPriv,
                'canPagoInscripcion' => $canPagoInscripcion,
                // Variables de instancia de Indicadores Económicos
                'pagoProspectos' => $pagoProspectos,
                'pagoExamPublico' => $pagoExamPublico,
                'pagoExamPrivado' => $pagoExamPrivado,
                'pagoTotal' => $pagoTotal,
                'general' => $reporteGeneral,
                'canUsuariosDia' => $canUsuariosDia,
                'dia' => $dia

            ]);
        }
    }
    function completar_fechas($fecha, $objeto)
    {
        $datos = [];
        $fecha_actual = date('Y-m-d');
        $json = json_encode($objeto);
        $objeto = json_decode($json, true);
        for ($fecha_inicio = date("Y-m-d", strtotime($fecha)); $fecha_inicio <= $fecha_actual; $fecha_inicio = date("Y-m-d", strtotime($fecha_inicio . "+ 1 days"))) {
            $keys = array_column($objeto, 'x');
            $index = array_search($fecha_inicio, $keys);
            if (is_numeric($index)) {
                array_push($datos, $objeto[$index]);
            } else {
                array_push($datos, [
                    'x' => $fecha_inicio,
                    'y' => 0,
                ]);
            }
        }
        return $datos;
    }    
    public function reporte_colegios(Request $request)
    {
        $id_provincia = isset($request->id_provincia) ? $request->id_provincia : null;
        $resultado = DB::table('fichas')
            ->join('colegios', 'fichas.diep_id_colegio', '=', 'colegios.ID_COLEGIO')     
            ->join('distritos', 'colegios.D_DIST', '=', 'distritos.distrito')       
            ->join('provincias', 'distritos.id_provincia', '=', 'provincias.id_provincia')       
            ->where('fichas.id_estado_revision', 3);     
        if ($id_provincia) {
            $resultado = $resultado->where('distritos.id_provincia', $id_provincia);
        }
        $resultado = $resultado
            ->select(
                DB::raw("provincias.provincia AS provincia"),
                DB::raw("colegios.CEN_EDU AS x"),
                DB::raw("distritos.distrito AS distrito"),
                DB::raw("COUNT(fichas.id) AS y")
            )
            ->groupBy('x')
            // ->orderBy('fichas.da_prov')
            ->orderBy('fichas.diep_id_colegio')
            ->get();
        return response()->json([
            'colegios' => $resultado
        ]);
    }
    public function reporte_distrito(Request $request)
    {
        $id_provincia = isset($request->id_provincia) ? $request->id_provincia : null;
        $resultado = DB::table('fichas')
            ->join('colegios','fichas.diep_id_colegio','=','colegios.ID_COLEGIO')
            ->join('distritos', 'colegios.D_DIST', '=', 'distritos.distrito')
            ->join('provincias', 'distritos.id_provincia', '=', 'provincias.id_provincia');
        if ($id_provincia) {
            $resultado = $resultado->where('distritos.id_provincia', $id_provincia);
        }
        $resultado = $resultado
            ->select(
                DB::raw("provincias.provincia AS provincia"),
                DB::raw("distritos.distrito AS x"),
                DB::raw("COUNT(fichas.id) AS y")
            )
            ->groupBy('x')
            ->orderBy('fichas.diep_id_colegio')
            ->get();
        return response()->json([
            'distrito' => $resultado
        ]);
    }
    
}
