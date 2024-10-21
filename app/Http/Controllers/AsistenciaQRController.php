<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AsistenciaQRController extends Controller
{
    // Método para buscar datos de la ficha por ID
    public function datosficha(Request $request)
    {
        // Buscar la ficha por ID en la base de datos
        $extracted = isset($request->extracted) ? $request->extracted : null;
        $dato = isset($request->dato) ? $request->dato : null;
        // Verificar si ambos filtros están en blanco
        if (empty($extracted) && empty($dato)) {
            return response()->json(['message' => 'No se proporcionaron filtros'], 400);
        }
        $usuario = DB::table('fichas')
            ->select(
                'fichas.id',
                'fichas.numero_documento',
                'fichas.dp_nombre as nombre',
                'fichas.dp_apellido_p',
                'fichas.dp_apellido_m',
                // 'fichas.condicion'
                'fichas.AD1'
            );
        if ($extracted) {
            $usuario = $usuario->having('fichas.id', $extracted);
        };
        if ($dato) {
            $usuario = $usuario->where(function ($query) use ($dato) {
                $query->Where('fichas.numero_documento', 'like', '%' . $dato . '%');
                $query->orWhere(DB::raw('concat(fichas.dp_apellido_p, " ",fichas.dp_apellido_m," ", fichas.dp_nombre)'), 'like', '%' . $dato . '%');
            });
        };
        $usuario = $usuario
            ->get();
        if (!$usuario->isEmpty()) {
            return response()->json($usuario);
        } else {
            return response()->json(['message' => 'Ficha no encontrada'], 404);
        }
    }
    public function registrarasistencia(Request $request){
        $extracted = $request->input('extracted');
        $dato = $request->input('dato');
        // Verificar si se proporciona un dato y actualizar la condición basada en el dato
        if ($dato) {
            // Buscar la ficha basada en el dato proporcionado
            $ficha = DB::table('fichas')
                        ->where(function ($query) use ($dato) {
                            $query->where('fichas.numero_documento', 'like', '%' . $dato . '%')
                                ->orWhere(DB::raw('concat(fichas.dp_apellido_p, " ",fichas.dp_apellido_m," ", fichas.dp_nombre)'), 'like', '%' . $dato . '%');
                        })
                        ->first(); // Obtener solo el primer resultado encontrado
            // Verificar si se encontró una ficha basada en el dato proporcionado
            if ($ficha) {
                // Actualizar la condición de la ficha encontrada a 'PRESENTE'
                DB::table('fichas')
                    ->where('id', $ficha->id)
                    // ->update(['condicion' => 'PRESENTE']);
                    ->update(['AD1' => 'PRESENTE']);

                return response()->json(['message' => 'Asistencia registrada con éxito']);
            } else {
                // Si no se encontró ninguna ficha basada en el dato proporcionado, devolver un mensaje de error
                return response()->json(['message' => 'No se encontró ninguna ficha con el dato proporcionado'], 404);
            }
        }
        // Verificar si el ID de la ficha está presente
        if (!$extracted) {
            return response()->json(['message' => 'ID de la ficha no proporcionado'], 400);
        }
        // Actualizar la condición a 'PRESENTE' basado en si se proporciona un ID
        DB::table('fichas')
            ->where('id', $extracted)
            // ->update(['condicion' => 'PRESENTE']);
            ->update(['AD1' => 'PRESENTE']);
        return response()->json(['message' => 'Asistencia registrada con éxito']);
    }
    public function listaasistencia(Request $request)
    {
        $condicion = isset($request->condicion) ? $request->condicion : null;
        $dato = isset($request->dato) ? $request->dato : null;
        $ficha = DB::table('fichas')
            ->select(
                'fichas.*',
                DB::raw('concat(fichas.dp_apellido_p, " ",fichas.dp_apellido_m) as apellidos'),
                'fichas.dp_nombre as nombre',
                'fichas.AD1 as condicion'
            );
        if ($dato) {
            $ficha = $ficha->where(function ($query) use ($dato) {
                $query->Where('fichas.numero_documento', 'like', '%' . $dato . '%');
                $query->orWhere(DB::raw('concat(fichas.dp_apellido_p, " ",fichas.dp_apellido_m," ", fichas.dp_nombre)'), 'like', '%' . $dato . '%');
            });
        }
        if ($condicion === 'PRESENTE') {
            // Si la condición es 'PRESENTE''
            $ficha->whereIn('fichas.AD1', ['PRESENTE']);
        } elseif ($condicion == 'AUSENTE') {
            // Si no es 'AUSENTE', realiza la búsqueda las casillas null y las casillas AUSENTE
            $ficha->where(function ($query) {
                $query->whereNull('fichas.AD1')
                ->orWhere('fichas.AD1', 'AUSENTE');
            });
        }
        $ficha = $ficha->groupBy('fichas.id');
        $ficha = $ficha->get();
        if ($ficha == null) {
            return response()->json(0);
        } else {
            return response()->json($ficha);
        }
    }
    public function reporteasistenciaqr(Request $request)
    {
        // INDICADORES DE ASISTENCIA
        // Cantidad de Postulantes Total
        $postulanteTotal = DB::table('fichas')
            ;
        $postulanteTotal = $postulanteTotal
            ->count();
        // Cantidad de Postulantes Ausentes
        $postulanteAusente = DB::table('fichas')
            ->where(function ($query) {
                $query->whereNull('fichas.AD1')
                    ->orWhere('fichas.AD1', 'AUSENTE')
                    ->orWhere('fichas.AD1','');
            });
        $postulanteAusente = $postulanteAusente
            // ->select('fichas.código_p')
            ->count();
        // Cantidad de Postulantes Presentes
        $postulantePresente = DB::table('fichas')
            ->whereIn('fichas.AD1', ['PRESENTE']);
        $postulantePresente = $postulantePresente
            ->count();
        $tablaaulas = DB::table('fichas')
            ->select(
                DB::raw('COUNT(CASE WHEN fichas.AD1 IS NULL OR fichas.AD1 = "AUSENTE" THEN 1 END) AS AUSENTES'),
                DB::raw('COUNT(CASE WHEN fichas.AD1 IN ("PRESENTE", "INGRESO", "NO INGRESO", "COBERTURA") THEN 1 END) AS PRESENTES'),
                DB::raw('COUNT(*) AS TOTAL')
            );
        return response()->json([
            // Llamado a la variable de instancia para que se retorne
            // Variables de Indicadores de Asistencia
            'postulanteTotal' => $postulanteTotal,
            'postulanteAusente' => $postulanteAusente,
            'postulantePresente' => $postulantePresente,
        ]);

    }
}