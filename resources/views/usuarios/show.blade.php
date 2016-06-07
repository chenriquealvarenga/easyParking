@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
	    <thead>
        <tr>
          <th>Nome</th>
          <th>Email</th>
          <th>RG</th>
          <?php 
            switch ($usuario->userable_type) {
              case 'Aluno':
                  echo "<th>Matrícula</th><th>CNH</th><th>Placa</th>";
                  break;
              case 'Funcionario':
                 echo "<th>Cargo</th><th>CNH</th><th>Placa</th>";
                  break;
              case 'Vigia':
                  
                  break;
              case 'Gerente':
                  
                  break;
              default:                
                  break;
            }
          ?>          
        </tr>
	    </thead>
	    <tbody>
	    	
		    		{{-- expr --}}
				<tr>
          <td>{{ $usuario->name }}</td>
          <td>{{ $usuario->email }}</td>
          <td>{{ $usuario->rg }}</td>
          <?php 
            switch ($usuario->userable_type) {
              case 'Aluno':
                  echo "<td>".$aluno->matricula."</td><td>".$aluno->cnh."</td><td>".$aluno->placa_veiculo."</td>";
                  break;
              case 'Funcionario':
                 echo "<td>".$funcionario->cargo."</td><td>".$funcionario->cnh."</td><td>".$funcionario->placa_veiculo."</td>";
                  break;
              case 'Vigia':
                  
                  break;
              case 'Gerente':
                  
                  break;
              default:                
                  break;
            }
          ?>
        </tr>
	    	
	    </tbody>
	</table>
</div>
@endsection
