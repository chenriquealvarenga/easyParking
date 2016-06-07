@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastro de Usuário</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/usuarios') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rg') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">RG</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="rg" value="{{ old('rg') }}">

                                @if ($errors->has('rg'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rg') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail </label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirme a Senha</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Tipo de Usuário</label>
                            <div class="col-md-6">
                                <select class="form-control" onchange="onchangeUserType()" name="tipo_usuario">
                                    <option value="gerente">Gerente</option>
                                    <option value="aluno">Aluno</option>
                                    <option value="funcionario">Funcionário</option>
                                    <option value="vigia">Vigia</option>
                                </select>                            
                            </div>
                        </div>

                        <div style="display:none" id="matricula" class="form-group{{ $errors->has('matricula') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Matrícula</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="matricula" value="{{ old('matricula') }}">

                                @if ($errors->has('matricula'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('matricula') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div style="display:none" id="placa_veiculo" class="form-group{{ $errors->has('placa_veiculo') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Placa do Veículo</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="placa_veiculo" value="{{ old('placa_veiculo') }}">

                                @if ($errors->has('placa_veiculo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('placa_veiculo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div style="display:none" id="cnh" class="form-group{{ $errors->has('cnh') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">CNH</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="cnh" value="{{ old('cnh') }}">

                                @if ($errors->has('cnh'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cnh') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div style="display:none" id="cargo" class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Cargo</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="cargo" value="{{ old('cargo') }}">

                                @if ($errors->has('cargo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cargo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Cadastrar
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
