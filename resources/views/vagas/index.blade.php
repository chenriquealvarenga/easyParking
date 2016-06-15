@extends('layouts.app')

@section('content')
<div class="container">
		<a href="{{ url('/vagas') }}/create" class="btn btn-info" role="button">Criar</a>
    <table class="table">
	    <thead>
	        <tr>
	            <th>Código</th>	            
	            <th>visualizar</th>
	            <th>editar</th>
	            <th>deletar</th>
	        </tr>
	    </thead>
	    <tbody>
	    	@foreach ($vagas as $vaga)
		    		{{-- expr --}}
				<tr>
		            <td>{{ $vaga->codigo }}</td>
		            <td><a href="{{ url('/vagas') }}/{{ $vaga->codigo }}" class="btn btn-info" role="button">ver</a></td>
		            <td><a href="{{ url('/vagas') }}/{{ $vaga->codigo }}/edit" class="btn btn-info" role="button">Editar</a></td>
		            <td>
		            	<form class="form-horizontal" role="form" method="POST" action="{{ url('/vagas') }}/{{$vaga->codigo}}">	{!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-delete">
                      <i class="fa fa-btn "></i>Deletar
                    </button>   
                  </form>
                </td>		            
		        </tr>
	    	@endforeach	        	        
	    </tbody>
	</table>
</div>
@endsection
