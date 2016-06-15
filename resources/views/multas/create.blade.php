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
                                
                                @if ($errors->has('usuario'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('usuario') }}</strong>
                                    </span>
                                @elseif($errors->any())
                                    <span class="help-block">
                                        <strong>{{$errors->first()}}</strong>
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
