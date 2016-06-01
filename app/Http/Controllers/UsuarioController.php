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
        //
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
        //
        $this->validate($request, array(
            'codigo' => 'required|max:10|unique:vagas',
            'area' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'status' => 'required',
        ));

        $vaga = new Vaga;

        $vaga->codigo = $request->codigo;
        $vaga->area = $request->area;
        $vaga->latitude = $request->latitude;
        $vaga->longitude = $request->longitude;
        $vaga->status = $request->status;

        $vaga->save();

        return redirect()->route('vagas.index');
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
