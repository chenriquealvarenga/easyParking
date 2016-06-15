<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Multa;
use App\Violacao;
use App\Aluno;
use App\Funcionario;
use App\User;
use App\Vigia;

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
        return view('multas.create')->withViolacaos($violacaos);
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
        ));

        $multa = new Multa;
        $multa->vigia = $request->vigia;
        $placa = $request->usuario;
        $multa->violacao = $request->violacao;
        $multa->datainicio = date("Y/m/d");

        $violacaoChosen = Violacao::find($multa->violacao);

        $multa->datafim = $this->addDayswithdate($multa->datainicio,$violacaoChosen->peso);  

        $func = Funcionario::where('placa_veiculo',$placa)->get()->first();
        $aluno = Aluno::where('placa_veiculo',$placa)->get()->first();
        if(!($func == null && $aluno == null))
        {
            if($func != null)
            {
                $userable_id = $func->id;
                $userable_type = 'Funcionario';
            }
            else
            {
                $userable_id = $aluno->id;
                $userable_type = 'Aluno';
            }
            $user = User::where('userable_id',$userable_id)->where('userable_type',$userable_type)->get()->first();
            $multa->usuario = $user->id;
            $multa->save();
            return redirect()->route('multas.index');
        }
        else{
            return redirect()->route('multas.create')->withErrors(['Placa não encontrada', '']);;
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
        $user = User::find($multa->usuario);
        $violacao = Violacao::find($multa->violacao);
        $vigia = User::find($multa->vigia);
        return view("multas.show")->withMulta($multa)->withUser($user)->withViolacao($violacao)->withVigia($vigia);
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
