<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Funcionario;
use App\Aluno;
use App\Gerente;
use App\Vigia;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$funcionarios = Funcionario::all();
        $usuarios = User::all();
        //dd($usuarios);
        //$gerentes = Gerente::all();
        //$alunos = Aluno::all();
        //$vigias = Vigia::all();        
        //return view('usuarios.index')->withFuncionarios($funcionarios)->withAlunos($alunos)->withVigias($vigias)->withGerentes($gerentes);
        return view('usuarios.index')->withUsuarios($usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\HttpP\Response
     */
    public function store(Request $request)
    {
        

        switch ($request->tipo_usuario) {
            case "aluno":
                $this->validate($request, array(
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|min:6|confirmed',
                    'matricula' => 'required|unique:alunos',
                    'cnh' => 'required|unique:alunos',
                    'placa_veiculo' => 'required'
                ));
                $aluno = new Aluno;

                $aluno->matricula = $request->matricula;
                $aluno->cnh = $request->cnh;
                $aluno->placa_veiculo = $request->placa_veiculo;
                $aluno->save();

                $userable_id = $aluno->id;
                $userable_type = "Aluno";
                break;

            case "gerente":
                $this->validate($request, array(
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|min:6|confirmed'
                ));
                $gerente = new Gerente;
                $gerente->save();

                $userable_id = $gerente->id;
                $userable_type = "Gerente";
                break;
            case "funcionario":
                $this->validate($request, array(
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|min:6|confirmed',
                    'cargo' => 'required',
                    'cnh' => 'required|unique:funcionarios',
                    'placa_veiculo' => 'required'
                ));
                $funcionario = new Funcionario;

                $funcionario->cargo = $request->cargo;
                $funcionario->cnh = $request->cnh;
                $funcionario->placa_veiculo = $request->placa_veiculo;
                $funcionario->save();
                $userable_id = $funcionario->id;
                $userable_type = "Funcionario";
                break;
            case "vigia":
                $this->validate($request, array(
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|min:6|confirmed'
                ));
                $vigia = new Vigia;
                $vigia->save();
                $userable_id = $vigia->id;
                $userable_type = "Vigia";
                break;           
        }
        

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->userable_id = $userable_id;
        $user->userable_type = $userable_type;
        $user->save();

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $user = User::find($codigo);
        return view("vagas.show")->withUsuario($user);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
