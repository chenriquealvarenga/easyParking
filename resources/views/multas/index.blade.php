@extends('layouts.app')

@section('content')
<div class="container">
	<a href="{{ url('/multas') }}/create" class="btn btn-info" role="button">Criar</a>
    <table class="table">
	    <thead>
	        <tr>
	            <th>Código</th>	            
	            <th>visualizar</th>
	            <th>deletar</th>
	        </tr>
	    </thead>
	    <tbody>
	    	@foreach ($multas as $multa)
		    		{{-- expr --}}
				<tr>
		            <td>{{ $multa->id }}</td>
		            <td><a href="{{ url('/multas') }}/{{ $multa->id }}" class="btn btn-info" role="button">ver</a></td>
		            <td>
		            	<form class="form-horizontal" role="form" method="POST" action="{{ url('/multas') }}/{{$multa->id}}">	{!! csrf_field() !!}
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
