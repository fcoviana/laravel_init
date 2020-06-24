@extends('shared.base')
@section('content')
@if(Session::has('mensagem'))
	<div class="row">
	<div class="col-md-12">
		<div class="alert alert-warning">
		<div align="center">
			{{ Session::get('mensagem')['msg'] }}
		</div>
		</div>
		</div>
	</div>        
@endif 
<div class="panel panel-default">
      <div class="panel-heading">Remover o imóvel</div>
		<div class="panel-body">
			<form method="post" action="{{route ('categorias.destroy', $categoria->id)}}">
            <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}
				<div class="row">
					<div class="col-md-12">
						<h4>Tem certeza que deseja remover a categoria?</h4>
						<hr>
						<h4>Sobre a categoria</h4>
						<p>Nome: {{$categoria->descricao}}</p>
					</div>
				</div>
				<button type="submit" class="btn btn-danger">Remover</button>
				<a href="{{ url()->previous() }}" class="btn btn-default">Cancelar</a>
			</form>
		</div>
	</div>
</div>
@endsection