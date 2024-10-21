<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = DB::table('users')
                    ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                    ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                    ->select(['users.id', 'users.id_tipo_documento', 'users.numero_documento','users.nombre', 'users.apellido_paterno', 'users.apellido_materno', 'users.numero_celular','users.email', 'users.numero_celular', 'users.email_verified_at', 'users.created_at', 'roles.id as id_role', 'roles.name as rol'])
                    ->orderBy('users.id','ASC')
                    ->get();;
        return response()->json($usuario);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_tipo_documento'=>['required'],
            'numero_documento'=>['required'],
            'nombre'=>['required'],
            'apellido_paterno'=>['required'],
            'apellido_materno'=>['required'],
            'numero_celular'=>['required'],
            'email'=>['required', 'email', 'unique:users'],
            'password'=>['required', 'min:6', 'confirmed'],
        ]);

        $user = User::create([
            'id_tipo_documento'=>$request->id_tipo_documento,
            'numero_documento'=>$request->numero_documento,
            'nombre'=>$request->nombre,
            'apellido_paterno'=>$request->apellido_paterno,
            'apellido_materno'=>$request->apellido_materno,
            'numero_celular'=>$request->numero_celular,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ])->assignRole($request->rol);
        return response()->json([
            'user'=>$user,
            'status'=>'success',
            'success'=>true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $id)
    {

        $user = User::find($id);

        $user->id_tipo_documento = $request->id_tipo_documento;
        $user->numero_documento = $request->numero_documento;

        $user->nombre = mb_strtoupper($request->nombre);
        $user->apellido_paterno = mb_strtoupper($request->apellido_paterno);
        $user->apellido_materno = mb_strtoupper($request->apellido_materno);
        $user->email = mb_strtolower($request->email);
        $user->numero_celular = $request->numero_celular;
        if($user->hasRole($request->rol)){

        }else{
            $user->syncRoles($request->rol);
        }
        $user->interesado = $request->interesado;
        if($user->save()){
            return response()->json([
            'user'=>$user,
            'status'=>'success',
            'success'=>true
            ]); 
        }
        

        /* dd($id);
        $user::where('id', $request->id)
        //$user->fill($request->post())->save();
        ->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        return response()->json([
            'user'=>$user
        ]); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        User::destroy($id);
        return response()->json([
            'status'=>'success'
        ]);
    }


    public function getRol(User $user, $id){
        $user = User::find($id);
        $roles = $user->getRoleNames();
        return response()->json([
            'rol'=>$roles
        ]);
    }

    public function actulizar_contrasena(Request $request){
        $request->validate([
            'id'=>['required'],
            'password'=>['required']
        ]);

        $user = User::find($request->id);
        $user->password = Hash::make($request->password);

        if($user->save()){
            $status="success";
            $success=1;
        }else{
            $status="false";
            $success=0;
        };
        return response()->json([
            'status'=>$status,
            'success'=>$success
        ]);
    }
}
