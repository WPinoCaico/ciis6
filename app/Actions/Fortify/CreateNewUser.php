<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'id_tipo_documento' => ['required', 'integer'],
            'numero_documento' => ['required', 'string', 'min:8', 'max:11', 'unique:users'],
            'nombre' => ['required', 'string', 'max:50'],
            'apellido_paterno' => ['required', 'string', 'max:50'],
            'apellido_materno' => ['required', 'string', 'max:50'],
            'numero_celular' => ['required', 'string', 'min:9', 'max:9'],
            'email' => [
                'required',
                'string',
                'email',
                'max:100',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'id_tipo_documento' => $input['id_tipo_documento'],
            'id_carrera' => $input['id_carrera'],
            'numero_documento' => $this->limpiar_datos($input['numero_documento']),
            'nombre' => mb_strtoupper($this->limpiar_datos($input['nombre'])),
            'apellido_paterno' => mb_strtoupper($this->limpiar_datos($input['apellido_paterno'])),
            'apellido_materno' => mb_strtoupper($this->limpiar_datos($input['apellido_materno'])),
            'numero_celular' => $this->limpiar_datos($input['numero_celular']),
            'email' => strtolower($this->limpiar_datos($input['email'])),
            'password' => Hash::make($input['password']),
        ])->assignRole('Postulante');
    }

    function limpiar_datos($cadena)
    {
        $no_permitidas = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹");
        $permitidas = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "u", "o", "O", "i", "a", "e", "U", "I", "A", "E");
        $texto = str_replace($no_permitidas, $permitidas, $cadena);
        return preg_replace("/\s+/", " ", trim($texto));
    }
}
