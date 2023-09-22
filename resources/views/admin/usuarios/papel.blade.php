@extends('admin.layouts.app')


@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">
        Usuários e Lista do Papeç<br>
        
    </h1>
    
    <div class="card mb-4 col-lg-3">

        <div class="card-body">
            <form action="{{route('usuarios.papel.store',$usuario->id)}}" method="post">
            {{ csrf_field() }}
            <div class="input-field mb-2">
                <select name="papel_id">
                    @foreach($papel as $valor)
                    <option value="{{$valor->id}}">{{$valor->nome}}</option>
                    @endforeach
                </select>
            </div>
                <button class="btn btn-success">Adicionar</button>
            </form>

        </div>
    </div>
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Papel</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($usuario->papeis as $papel)
                <tr>
                    <td>{{ $papel->nome }}</td>
                    <td>{{ $papel->descricao }}</td>

                    <td>

                        <form action="{{route('usuarios.papel.destroy',[$usuario->id,$papel->id])}}" method="post">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button title="Deletar" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            
          </tbody>
    </table>

</div>
@endsection