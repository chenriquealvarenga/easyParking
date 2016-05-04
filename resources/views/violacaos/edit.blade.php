@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Criar Vaga</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/violacao') }}/{{$violacao->id}}">	{!! csrf_field() !!}
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group{{ $errors->has('peso') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Peso</label>

                            <div class="col-md-6">
                                <select class="form-control" name="peso">
                                    
                                    @if ($violacao->peso == '1')
                                        <option value="1" selected="selected">1</option>
                                    @else
                                        <option value="1">1</option>
                                    @endif
                                    
                                    @if ($violacao->peso == '2')
                                        <option value="2" selected="selected">2</option>
                                    @else
                                        <option value="2">2</option>
                                    @endif

                                    @if ($violacao->peso == '3')
                                        <option value="3" selected="selected">3</option>
                                    @else
                                        <option value="3">3</option>
                                    @endif        	
                                </select>

                                @if ($errors->has('peso'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('peso') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						<div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Descrição</label>

                            <div class="col-md-6">
                                <textarea type="text" class="form-control" name="descricao" >{{ $violacao->descricao }}</textarea>

                                @if ($errors->has('descricao'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descricao') }}</strong>
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
