@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Criar Vaga</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/vagas') }}">	{!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('codigo') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Código</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="codigo" value="{{ old('codigo') }}">

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
                                	<option value="decom">Decom</option>
                                	<option value="principal">Principal</option>
                                	<option value="entrada">Entrada</option>
                                	<option value="funcionario">Funcionário</option>
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
                                <input type="text" class="form-control" name="latitude" value="{{ old('latitude') }}">

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
                                <input type="text" class="form-control" name="longitude" value="{{ old('longitude') }}">

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
                                	<option value="livre">Livre</option>
                                	<option value="interditada">Interditada</option>
                                	<option value="ocupada">Ocupada</option>
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
                                    <i class="fa fa-btn "></i>Create
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
