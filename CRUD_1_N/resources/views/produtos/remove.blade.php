@extends('shared.base')
@section('content')
<div class="panel panel-default">
      <div class="panel-heading">Remover o produto</div>
        <div class="panel-body">
            <form method="post" action="{{route ('produtos.destroy', $produto->id)}}">
            <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <h4>Tem certeza que deseja remover o produto?</h4>
                        <hr>
                        <h4>Sobre o produto</h4>
                        <p>Descrição: {{$produto->descricao}}</p>
                        <p>Preço: R$ {{number_format($produto->preco, 2, ',', '.')}}</p>
                        <p>Cor: {{$produto->cor}}</p>
                        <p>Peso: {{$produto->peso}}</p>
                    </div>
                </div>
                <button type="submit" class="btn btn-danger">Remover</button>
                <a href="{{ url()->previous() }}" class="btn btn-default">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection