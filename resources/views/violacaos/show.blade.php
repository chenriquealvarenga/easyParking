@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
	    <thead>
        <tr>
          <th>Id</th>
          <th>Peso</th>
          <th>Descrição</th>
        </tr>
	    </thead>
	    <tbody>
	    	
		    		{{-- expr --}}
				<tr>
          <td>{{ $violacao->id }}</td>
          <td>{{ $violacao->peso }}</td>
          <td>{{ $violacao->descricao }}</td>
        </tr>
	    	
	    </tbody>
	</table>
</div>
@endsection
