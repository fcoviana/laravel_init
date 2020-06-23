@extends('shared.base')
@section('content')
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Detalhes do produto</div>
        <div class="panel-body">  
            <div class="row">
                <div class="col-md-12">
                    <h4>Sobre o produto</h4>
                        <p>Descrição: {{$produto->descricao}}</p>
                        <p>Preço: R$ {{number_format($produto->preco, 2, ',', '.')}}</p>
                        <p>Cor: {{$produto->cor}}</p>
                        <p>Peso: {{$produto->peso}}</p>
                        <p>Marca: {{$produto->marca->nome}}</p>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
@endsection