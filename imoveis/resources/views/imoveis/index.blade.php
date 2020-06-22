@extends('shared.base')

@section('content')

<div class="panel panel-default">    
        <div class="panel-heading">Lista de Imóveis</div>
        <form method="GET" action="{{route('imoveis.index', 'buscar' )}}">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Digite o nome da cidade" name="buscar">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Pesquisar</button>
                    </span>
                </div>
            </div>
        </div>
        </form>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Descrição</th>
                            <th>Cidade</th>
                            <th>Preço</th>
                            <th>Finalidade</th>
                            <th>Tipo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>            
                    <tbody>            
                        @foreach($imoveis as $imovel)
                            <tr>
                                <td>{{$imovel->descricao}}</td>
                                <td>{{$imovel->cidadeEndereco}}</td>
                                <td>{{$imovel->preco}}</td>
                                <td>{{$imovel->finalidade}}</td>
                                <td>{{$imovel->tipo}}</td>
                                <td>
                                    <a href="{{route('imoveis.edit', $imovel->id)}}"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a href="{{route('imoveis.remove', $imovel->id)}}"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="{{route('imoveis.show', $imovel->id)}}"><i class="glyphicon glyphicon-zoom-in"></i></a>
                                </td>                                
                            </tr>                         
                        @endforeach                                
                    </tbody>
                </table> 
            </div> 
        </div>
        <div align="center" class="row">
            {{ $imoveis->links() }}
        </div>
    </div>
    <a href="{{route('imoveis.create')}}"><button class="btn btn-primary">Adicionar</button></a>
@endsection