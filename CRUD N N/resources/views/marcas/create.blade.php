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
 
        <div class="panel-heading"><h3>Cadastre a marca</h3></div>
        <div class="panel-body">
            <form method="post" action="{{route ('marcas.store')}}">
                {{ csrf_field() }}
                <h4>Dados da marca</h4>
                <hr>
                <div class="form-group">
                    <label for="descricao">Nome</label>
                    <input type="text" class="form-control" placeholder="Nome" name="nome" required>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection