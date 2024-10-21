<?php
namespace App\Http\Controllers;
use App\Models\Ficha;
use App\Http\Requests\StoreFichaRequest;
use App\Http\Requests\UpdateFichaRequest;
use App\Mail\PostulanteInscrito;
use App\Mail\PostulanteInscritoCepre;
use App\Models\Documento;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PDF;
use image;
class FichaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Ficha principal index
    public function index()
    {
        $ficha = DB::table('fichas')
            // ->join('colegios', 'fichas.diep_id_colegio', '=', 'colegios.ID_COLEGIO')
            // ->select('fichas.*', 'colegios.GESTION as gestion_colegio', 'colegios.D_GESTION as gestion_colegio_nom')
            // ->where('user_id', Auth::user()->id)
            // ->where('id_estado', 1)
            // ->orderBy('postulacion', 'desc')
            ->limit(1)
            ->get();
        if ($ficha == null) {
            return response()->json(0);
        } else {
            return response()->json($ficha);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFichaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ficha = Ficha::create([
            'dp_apellido_p' => mb_strtoupper($this->limpiar_datos($request->apellidoPaterno)),
            'dp_apellido_m' => mb_strtoupper($this->limpiar_datos($request->apellidoMaterno)),
            'dp_nombre' => mb_strtoupper($this->limpiar_datos($request->nombres)),
            'numero_documento' => $request->dni,       
            'da_numero_celular' => $request->telefonoCelular,
            'da_email' => $request->correo,
        ]);
        $id_ficha_new = $ficha->id;
        $status = 'success';
        $success = 1;
        return response()->json([
            'success' => $success,
            'status' => $status
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ficha = DB::table('fichas')
            ->select('fichas.*')
            ->where('fichas.id', $id)
            ->get();
        if ($ficha == null) {
            return response()->json(0);
        } else {
            return response()->json(['ficha' => $ficha->first()]);
        }
    }
    public function ver($id)
    {
        $ficha = DB::table('fichas')
            ->where('fichas.id', $id)
            ->get();
        if ($ficha == null) {
            return response()->json(0);
        } else {
            return response()->json(['ficha' => $ficha->first()]);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function edit(Ficha $ficha)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFichaRequest  $request
     * @param  \App\Models\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function generar_carnet(Request $request)
    {
        $url = 'https://admision.undc.edu.pe/carne_postulante.php?token=' . $request->token;
        $qrcode = base64_encode(QrCode::format('svg')->size(164)->errorCorrection('H')->generate($url));
        $token = isset ($request->token) ? $request->token : null;
        $download = isset ($request->token) ? $request->download : null;
        $id_ficha = base64_decode($token);
        $resultado = $this->ver($id_ficha);
        $resultado = $resultado->getData('ficha');
        if ($download && $download = "si") {
            $fecha = date("Y-m-d H:i:s");
            $affected = DB::table('fichas')
                ->where('id', $id_ficha)
                ->update([
                    'fecha_confor_carne' => $fecha,
                ]);
        }
        $resultado['ficha']['qr'] = $qrcode;
        $nombre = DB::table('fichas')
            ->select('fichas.dp_apellido_p', 'fichas.dp_apellido_m', 'fichas.dp_nombre','fichas.numero_documento')
            ->where('fichas.id', $id_ficha)
            ->first();
        $nombreArchivo = $nombre->dp_apellido_p . ' ' . $nombre->dp_apellido_m . ', ' . $nombre->dp_nombre . '- Carne CIIS6.pdf';
        $pdf = PDF::loadView('carnepdf2', $resultado['ficha'])
        ;
        if ($download && $download = "si") {
            return $pdf->download($nombreArchivo);
        } else {
            return $pdf->stream($nombreArchivo);
        }
    }
    public function descargacarnet(Request $request)
    {
        $estado = isset ($request->estado) ? $request->estado : null;
        $dato = isset ($request->dato) ? $request->dato : null;
        $ficha = DB::table('fichas')            
            ->select(
                'fichas.*',
                DB::raw('concat(fichas.dp_apellido_p, " ",fichas.dp_apellido_m) as apellidos'),
                
            )
            ;
        if ($dato) {
            $ficha = $ficha->where(function ($query) use ($dato) {
                $query->Where('fichas.numero_documento', 'like', '%' . $dato . '%');
                $query->orWhere(DB::raw('concat(fichas.dp_apellido_p, " ",fichas.dp_apellido_m," ", fichas.dp_nombre)'), 'like', '%' . $dato . '%');
            });
        }
        if (is_numeric($estado)) {
            if ($estado == 1) {
                // Si el estado es 1, buscamos donde la fecha no es null
                $ficha = $ficha->whereNotNull('fichas.fecha_confor_carne');
            } elseif ($estado == 0) {
                // Si el estado es 0, buscamos donde la fecha es null
                $ficha = $ficha->whereNull('fichas.fecha_confor_carne');
            }
        }
        $ficha = $ficha->groupBy('fichas.id')
            ->orderByRaw('fichas.dp_apellido_p ASC');
        $ficha = $ficha->get();

        if ($ficha == null) {
            return response()->json(0);
        } else {
            return response()->json($ficha);
        }
    }
    function limpiar_datos($cadena)
    {
        $no_permitidas = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹");
        $permitidas = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "u", "o", "O", "i", "a", "e", "U", "I", "A", "E");
        $texto = str_replace($no_permitidas, $permitidas, $cadena);
        return preg_replace("/\s+/", " ", trim($texto));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ficha $ficha)
    {
        //
    }
}