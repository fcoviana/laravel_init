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
 
        <div class="panel-heading"><h3>Cadastre o imóvel</h3></div>
        <div class="panel-body">
 
    <form method="post" action="{{route ('imoveis.store')}}">
        {{ csrf_field() }}
        <h4>Dados do imóvel</h4>
        <hr>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" placeholder="Descrição" name="descricao" required>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" placeholder="Preço" name="preco" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="qtdQuartos">Quantidade de Quartos</label>
                    <input type="number" class="form-control" placeholder="Quantidade de Quartos" required name="qtdQuartos">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tipo">Tipo do imóvel</label>
                    <select class="form-control" name="tipo" required>
                        <option>Apartamento</option>
                        <option>Casa</option>
                        <option>Kitnet</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="qtdQuartos">Finalidade do imóvel</label>
                    <select class="form-control" name="finalidade" required>
                        <option>Venda</option>
                        <option>Locação</option>
                    </select>
                </div>
            </div>
        </div>
        <h4>Endereço</h4>
        <hr>
 
            <div class="form-group">
                <label for="logradouroEndereco">Logradouro</label>
                <input type="text" class="form-control" placeholder="Logradouro" required name="logradouroEndereco">
            </div>
        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <label for="bairroEndereco">Bairro</label>
                    <input type="text" class="form-control" placeholder="Bairro" required name="bairroEndereco">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="numero">Número</label>
                    <input type="number" class="form-control" placeholder="Número" required name="numeroEndereco">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cidadeEndereco">Cidade</label>
                    <input type="text" class="form-control" placeholder="Cidade" required name="cidadeEndereco">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cepEndereco">CEP</label>
                    <input type="text" class="form-control" placeholder="CEP" required name="cepEndereco">
                </div>
            </div>
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
        </div>
    </div>
 
@endsection