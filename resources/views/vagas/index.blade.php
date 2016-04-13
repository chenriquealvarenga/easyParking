@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
	    <thead>
	        <tr>
	            <th>Código</th>
	            <th>Área</th>
	            <th>Latitude</th>
	            <th>Longitude</th>
	            <th>Status</th>
	        </tr>
	    </thead>
	    <tbody>
	    	@foreach ($vagas as $vaga)
		    		{{-- expr --}}
				<tr>
		            <td>{{ $vaga->codigo }}</td>
		            <td>{{ $vaga->area }}</td>
		            <td>{{ $vaga->latitude }}</td>
		            <td>{{ $vaga->longitude }}</td>
		            <td>{{ $vaga->status }}</td>
		        </tr>
	    	@endforeach	        	        
	    </tbody>
	</table>
</div>
@endsection
