@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
	    <thead>
        <tr>
          <th>Id</th>
          <th>Vigia</th>
          <th>Usuário</th>
          <th>Violação</th>
          <th>Data de início</th>
          <th>Data de término</th>
        </tr>
	    </thead>
	    <tbody>
	    	
		    		{{-- expr --}}
				<tr>
          <td>{{ $multa->id }}</td>
          <td>{{ $multa->vigia }}</td>
          <td>{{ $multa->usuario }}</td>
          <td>{{ $multa->violacao }}</td>
          <td>{{ $multa->datainicio }}</td>
          <td>{{ $multa->datafim }}</td>
        </tr>
	    	
	    </tbody>
	</table>
</div>
@endsection
