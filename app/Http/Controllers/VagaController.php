<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Vaga;

class VagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $vagas = Vaga::all();

        return view('vagas.index')->withVagas($vagas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vagas.create');
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
     * @param  string  $codigo
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {   
        //$vaga = Vaga::where('codigo', $codigo)->first();
        $vaga = Vaga::find($codigo);
        return view("vagas.show")->withVaga($vaga);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        $vaga = Vaga::find($codigo);

        return view('vagas.edit')->withVaga($vaga);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $codigo)
    {
        //
        $this->validate($request, array(
            'codigo' => 'required|max:10',
            'area' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'status' => 'required',
        ));

        $vaga = Vaga::find($codigo);

        $vaga->codigo = $request->codigo;
        $vaga->area = $request->area;
        $vaga->latitude = $request->latitude;
        $vaga->longitude = $request->longitude;
        $vaga->status = $request->status;

        $vaga->save();

        //Session::flash('success','teste flash!');
        return redirect()->route('vagas.show', $vaga->codigo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $codigo
     * @return \Illuminate\Http\Response
     */
    public function destroy($codigo)
    {
        //
        $vaga = Vaga::find($codigo);

        $vaga->delete();
        return redirect()->route('vagas.index');
    }
}
