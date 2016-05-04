<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Violacao;

class ViolacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $violacaos = Violacao::all();

        return view('violacaos.index')->withViolacaos($violacaos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('violacaos.create');
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
            'peso' => 'required',
            'descricao' => 'required'
        ));

        $violacao = new Violacao;

        $violacao->peso = $request->peso;
        $violacao->descricao = $request->descricao;        

        $violacao->save();

        return redirect()->route('violacaos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $violacao = Violacao::find($id);
        return view("violacaos.show")->withViolacao($violacao);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $violacao = Violacao::find($id);

        return view('violacaos.edit')->withViolacao($violacao);
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
        $this->validate($request, array(
            'peso' => 'required',
            'descricao' => 'required'
        ));

        $violacao = Violacao::find($id);

        $violacao->peso = $request->peso;
        $violacao->descricao = $request->descricao;        

        $violacao->save();

        //Session::flash('success','teste flash!');
        return redirect()->route('violacaos.show', $violacao->id);
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
        $violacao = Violacao::find($id);

        $violacao->delete();
        return redirect()->route('violacaos.index');
    }
}
