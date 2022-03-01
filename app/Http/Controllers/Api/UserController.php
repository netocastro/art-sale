<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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

        /**
         * Não consigo alterar os valores que vem na variavel request para utilizar
         * o User::create(). Estou tentando passar uma hash na senha mas a senha não é
         * mudada, ja usei:
         * $request->password = Hash::make($request->password);
         * $request->input('password', Hash::make($request->password));
         * e não funciona
         */

        $findEmptyFields = array_keys($request->all(), '');

        if ($findEmptyFields) {
            echo json_encode(['emptyFields' => $findEmptyFields]);
            return;
        }

        $validateFields = [];

        if (!validateEmail($request->email)) {
            $validateFields['email'] = 'Email inválido';
        }

        if (User::where('email', $request->email)->exists()) {
            $validateFields['email'] = 'Email já está cadastrado';
        }

        if (!validateCpf($request->cpf)) {
            $validateFields['cpf'] = 'Formato de CPF inválido';
        }

        if (User::where('cpf', $request->cpf)->exists()) {
            $validateFields['cpf'] = 'CPF já cadastrado';
        }

        if (User::where('nick', $request->nick)->exists()) {
            $validateFields['nick'] = 'Nick já cadastrado';
        }

        if (!validateName($request->name)) {
            $validateFields['name'] = 'Formato do nome inválido';
        }

        if (strlen($request->name) > 100) {
            $validateFields['name'] = 'Quantidade de caracteres superior a 100';
        }

        if ($request->password != $request->repeat_password) {
            $validateFields['repeat_password'] = "Senhas não conferem";
        }

        if ($validateFields) {
            echo json_encode(['validateFields' => $validateFields]);
            return;
        }

        $user = new User();

        $user->name = $request->name;
        $user->cpf = $request->cpf;
        $user->email = $request->email;
        $user->nick= $request->nick;
        $user->password= Hash::make($request->password);

        $saved = $user->save();

        if ($saved) {
            return json_encode(['success' => 'Registrado com sucesso']);
        } else {
            return 'error';
            /**
             * não consigo retornar um erro diferente, por exemplo estou salvando
             * um nome com numero superior de caracteres permitido pelo banco de dados
             * e ele esta me voltando um erro com um objeto do laravel.
             */
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
