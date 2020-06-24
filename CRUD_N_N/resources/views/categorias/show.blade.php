@extends('shared.base')
@section('content')
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Detalhes da categoria</div>
        <div class="panel-body">  
            <div class="row">
                <div class="col-md-12">
                    <h4>Sobre a categoria</h4>
					<p>Descrição: {{$categoria->descricao}}</p>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
@endsection