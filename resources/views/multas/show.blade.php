@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
	    <thead>
        <tr>
          <th>Vigia</th>
          <th>Usuario</th>
          <th>Violação</th>
          <th>Data de início</th>
          <th>Data de término</th>
        </tr>
	    </thead>
	    <tbody>
	    	
		    		{{-- expr --}}
				<tr>
          <td>{{ $vigia->name }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $violacao->descricao }}</td>
          <td>{{ $multa->datainicio }}</td>
          <td>{{ $multa->datafim }}</td>
        </tr>
	    	
	    </tbody>
	</table>
</div>
@endsection
