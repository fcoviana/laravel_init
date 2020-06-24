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
        <div class="panel-heading"><h3>Edite a categoria</h3></div>
        <div class="panel-body">
            <form method="post" action="{{route ('categorias.update', $categoria->id)}}">  
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}          
                <h4>Dados do categoria</h4>
                <hr>
                <div class="form-group">
                    <label for="descricao">Descriçao</label>
                    <input type="text" class="form-control" placeholder="Descriçao" name="descricao" required value="{{$categoria->descricao}}">
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
                <button type="submit" class="btn btn-primary">Editar</button>
            </form>
        </div>
    </div>
@endsection