@extends('shared.base')
@section('content')
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Edite o produto</h3></div>
        <div class="panel-body">
            <form method="post" action="{{route ('produtos.update', $produto->id)}}">  
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}          
                <h4>Dados do produto</h4>
                <hr>
                    <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" placeholder="Descrição" name="descricao" required value="{{$produto->descricao}}">
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" placeholder="Preço" name="preco" required value="{{$produto->preco}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="qtdQuartos">Cor</label>
                    <input type="text" class="form-control" placeholder="Cor" required name="cor"value="{{$produto->cor}}"> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="qtdQuartos">Peso</label>
                    <input type="text" class="form-control" placeholder="Peso" required name="peso" value="{{$produto->peso}}">
                </div>
            </div>
        </div>
        <h4>Marca</h4>
        <hr>
        <div class="form-group">
            <label for="marca_id">Selecione a marca deste produto</label>
            <select class="form-control" name="marca_id" required>
            @foreach($marcas as $marca)            
                <option value="{{$marca->id}}"
                {{(isset($produto->marca_id) && $produto->marca_id == $marca->id ? 
                'selected' : '')}}>{{$marca->nome}}
                </option>
            @endforeach
            </select>
        </div>     
                <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
                <button type="submit" class="btn btn-primary">Editar</button>
        </form>
        </div>
    </div>
@endsection