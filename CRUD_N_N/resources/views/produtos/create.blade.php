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

        <div class="panel-heading"><h3>Cadastre o produto</h3></div>
        <div class="panel-body">

    <form method="post" action="{{route ('produtos.store')}}">
        {{ csrf_field() }}
        <h4>Dados do produto</h4>

        <hr>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" placeholder="Descrição" name="descricao" required>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" placeholder="Preço" name="preco" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="qtdQuartos">Cor</label>
                    <input type="text" class="form-control" placeholder="Cor" required name="cor">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="qtdQuartos">Peso</label>
                    <input type="text" class="form-control" placeholder="Peso" required name="peso">
                </div>
            </div>
        </div>   
        <h4>Marca</h4>
        <hr>
        <div class="form-group">
            <label for="marca_id">Selecione a marca deste produto</label>
            <select class="form-control" name="marca_id" required>
            @foreach($marcas as $marca)            
                <option value="{{$marca->id}}">{{$marca->nome}}</option>            
            @endforeach
            </select>
        </div>  
        <h4>Categorias</h4>
        <hr>
        <div class="form-group">
            <label for="categoria_id">Selecione as categorias deste produto</label>
            <select multiple class="form-control" name="categoria_id[]" required>
            @foreach($categorias as $categoria)            
                <option value="{{$categoria->id}}">{{$categoria->descricao}}</option>            
            @endforeach
            </select>
        </div>   
        <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
        </div>
    </div>

@endsection