@extends('admin.layouts.app')


@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">
        Usuários <br>
        
    </h1>
    
    
    <table class="table table-dark table-hover">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Detalhes</th>
            </tr>
        </thead>
        <tbody>
            
        @foreach($usuarios as $usuario)
            <tr>
                <th scope="row">{{ $usuario->id }}</th>
                
                <td>{{ $usuario->name }}</td>
                
                <td>{{ $usuario->email }}</td>
                <td>
                    <a href="{{ route('usuarios.papel', $usuario->id) }}" class="btn btn-success"><i class="fa fa-lock"></i></a> 
                </td>
            </tr>
        @endforeach
            
          </tbody>
    </table>

</div>
@endsection