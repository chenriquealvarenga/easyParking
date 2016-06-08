@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Aplicar multa</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/multas') }}">	{!! csrf_field() !!}


                        <input type="hidden" name="vigia" value="{{ Auth::user()->id }}">


						<div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Placa do veículo</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="usuario" value="{{ old('usuario') }}"></textarea>
                                
                                <!-- @foreach ($alunos as $aluno)
                                    
                                    <input type="checkbox" class="form-control" name="usuario" value="{{ $aluno->id }}">{{ $aluno->placa_veiculo }}<br>
                                @endforeach -->


                                @if ($errors->has('usuario'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('usuario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('violacao') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Violacao</label>

                            <div class="col-md-6">

                                @foreach ($violacaos as $violacao)
                                    {{-- expr --}}
                                    <input type="checkbox" class="form-control" name="violacao" value="{{ $violacao->id }}">{{ $violacao->descricao }}<br>
                                @endforeach

                                @if ($errors->has('violacao'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('violacao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group{{ $errors->has('datainicio') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Data de início</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="datainicio" value="{{ date("d/m/Y") }}"></textarea>

                                @if ($errors->has('datainicio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('datainicio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->

                        <!-- <div class="form-group{{ $errors->has('datafim') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Data de término</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="datafim" value="{{ old('datafim') }}"></textarea>

                                @if ($errors->has('datafim'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('datafim') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn "></i>Aplicar
                                </button>             
                            </div>
                        </div>                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
