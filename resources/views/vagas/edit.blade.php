@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Criar Vaga</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/vagas') }}/{{$vaga->codigo}}">	{!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('codigo') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Código</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="codigo" value="{{ $vaga->codigo }}">

                                @if ($errors->has('codigo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('codigo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('area') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Área</label>

                            <div class="col-md-6">
                                <select class="form-control" name="area">
                                    
                                    @if ($vaga->area == 'decom')
                                        <option value="decom" selected="selected">Decom</option>
                                    @else
                                        <option value="decom">Decom</option>
                                    @endif
                                    
                                    @if ($vaga->area == 'principal')
                                        <option value="principal" selected="selected">Principal</option>
                                    @else
                                        <option value="principal">Principal</option>
                                    @endif

                                    @if ($vaga->area == 'entrada')
                                        <option value="entrada" selected="selected">Entrada</option>
                                    @else
                                        <option value="entrada">Entrada</option>
                                    @endif

                                    @if ($vaga->area == 'funcionario')
                                        <option value="funcionario" selected="selected">Funcionário</option>
                                    @else
                                        <option value="funcionario">Funcionário</option>
                                    @endif                                	
                                </select>

                                @if ($errors->has('area'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						<div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Latitude</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="latitude" value="{{ $vaga->latitude }}">

                                @if ($errors->has('latitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('latitude') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Longitude</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="longitude" value="{{ $vaga->longitude }}">

                                @if ($errors->has('longitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('longitude') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                                <select class="form-control" name="status">

                                    @if ($vaga->status == 'livre')
                                        <option value="livre" selected="selected">Livre</option>
                                    @else
                                        <option value="livre">Livre</option>
                                    @endif

                                    @if ($vaga->status == 'interditada')
                                        <option value="interditada" selected="selected">Interditada</option>
                                    @else
                                        <option value="interditada">Interditada</option>
                                    @endif

                                    @if ($vaga->status == 'Ocupada')
                                        <option value="Ocupada" selected="selected">Ocupada</option>
                                    @else
                                        <option value="Ocupada">Ocupada</option>
                                    @endif
                                </select>

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn "></i>Edit
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
