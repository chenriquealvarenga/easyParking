@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastro de Usuário</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/usuarios') }}/{{$usuario->id}}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ $usuario->name }}">

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
                                <input type="text" class="form-control" name="rg" value="{{ $usuario->rg }}">

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
                                <input type="email" class="form-control" name="email" value="{{ $usuario->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tipo de Usuário</label>
                            <div class="col-md-6">
                                <select disabled class="form-control" name="tipo_usuario">
                                <?php
                                    switch ($usuario->userable_type) {
                                      case 'Aluno':
                                        echo '<option selected value="aluno">Aluno</option>';
                                        echo '<option value="funcionario">Funcionário</option>';
                                        echo '<option value="vigia">Vigia</option>';
                                        echo '<option value="gerente">Gerente</option>';
                                          break;
                                      case 'Funcionario':
                                        echo '<option value="aluno">Aluno</option>';
                                        echo '<option selected value="funcionario">Funcionário</option>';
                                        echo '<option value="vigia">Vigia</option>';
                                        echo '<option value="gerente">Gerente</option>';
                                          break;
                                      case 'Vigia':
                                        echo '<option value="aluno">Aluno</option>';
                                        echo '<option value="funcionario">Funcionário</option>';
                                        echo '<option selected value="vigia">Vigia</option>';
                                        echo '<option value="gerente">Gerente</option>';
                                          break;
                                      case 'Gerente':
                                        echo '<option value="aluno">Aluno</option>';
                                        echo '<option value="funcionario">Funcionário</option>';
                                        echo '<option value="vigia">Vigia</option>';
                                        echo '<option selected value="gerente">Gerente</option>';
                                          break;
                                      default:                
                                          break;
                                    }                                     
                                ?>
                                </select>                            
                            </div>
                        </div>
                        @if ($usuario->userable_type == "Aluno")
                            <div  id="matricula" class="form-group{{ $errors->has('matricula') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Matrícula</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="matricula" value="{{ $aluno->matricula }}">

                                    @if ($errors->has('matricula'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('matricula') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif
                        

                        @if ($usuario->userable_type == 'Aluno')
                            <div   id="placa_veiculo" class="form-group{{ $errors->has('placa_veiculo') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Placa do Veículo</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="placa_veiculo" value="{{$aluno->placa_veiculo}}" >

                                    @if ($errors->has('placa_veiculo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('placa_veiculo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if ($usuario->userable_type == 'Funcionario')
                            <div   id="placa_veiculo" class="form-group{{ $errors->has('placa_veiculo') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Placa do Veículo</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="placa_veiculo" value="{{$funcionario->placa_veiculo}}" >

                                    @if ($errors->has('placa_veiculo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('placa_veiculo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif
                        
                        @if ($usuario->userable_type == 'Aluno')
                            <div id="cnh" class="form-group{{ $errors->has('cnh') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">CNH</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="cnh" value="{{$aluno->cnh}}">

                                    @if ($errors->has('cnh'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cnh') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if ($usuario->userable_type == 'Funcionario')
                            <div id="cnh" class="form-group{{ $errors->has('cnh') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">CNH</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="cnh" value="{{$funcionario->cnh}}">

                                    @if ($errors->has('cnh'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cnh') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif
                        @if ($usuario->userable_type == 'Funcionario' )
                            <div id="cargo" class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Cargo</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="cargo" value="{{$funcionario->cargo}}">

                                    @if ($errors->has('cargo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cargo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Editar
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
