@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
	    <thead>
	        <tr>
	            <th>Nome</th>	            
	            <th>visualizar</th>
	            <th>editar</th>
	            <th>deletar</th>
	        </tr>
	    </thead>
	    <tbody>
	    	@foreach ($usuarios as $usuario)
		    		{{-- expr --}}
				<tr>
		            <td>{{ $usuario->name }}</td>
		            <td><a href="{{ url('/usuarios') }}/{{ $usuario->id }}" class="btn btn-info" role="button">ver</a></td>
		            <td><a href="{{ url('/usuarios') }}/{{ $usuario->id }}/edit" class="btn btn-info" role="button">Editar</a></td>
		            <td>
		            	<form class="form-horizontal" role="form" method="POST" action="{{ url('/usuarios') }}/{{$usuario->id}}">	{!! csrf_field() !!}
                    <input type="hidden" id="_method" value="DELETE">
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
