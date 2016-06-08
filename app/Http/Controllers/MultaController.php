<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Multa;
use App\Violacao;
use App\Aluno;
use App\Funcionario;

class MultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $multas = Multa::all();

        return view('multas.index')->withMultas($multas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$violacaos = Violacao::all();
    	$alunos = Aluno::all();
    	$funcionarios = Funcionario::all();
        return view('multas.create')->withViolacaos($violacaos)->withAlunos($alunos)
        							->withFuncionarios($funcionarios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, array(
            'vigia' => 'required',
            'usuario' => 'required',
            'violacao' => 'required',
            // 'datafim' => 'required'
        ));

        $multa = new Multa;
        $multa->vigia = $request->vigia;
        $multa->usuario = $request->usuario;
        $multa->violacao = $request->violacao;
        $multa->datainicio = date("Y/m/d");

        $violacaoChosen = Violacao::find($multa->violacao);

        $multa->datafim = $this->addDayswithdate($multa->datainicio,$violacaoChosen->peso);  

        if(!Funcionario::find($multa->usuario) && !Aluno::find($multa->usuario))
        {

        }
        else
        {
        	$multa->save();

        	return redirect()->route('multas.index');
        }
        
    }

    public function addDayswithdate($date,$days){

    	$date = strtotime("+".$days." days", strtotime($date));
    	return  date("Y-m-d", $date);

	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $multa = Multa::find($id);
        return view("multas.show")->withMulta($multa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
        $multa = Multa::find($id);

        $multa->delete();
        return redirect()->route('multas.index');
    }
}
