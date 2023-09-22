@extends('admin.layouts.app')


@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">
        Usuários <br>
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                +
            </span>
            <span class="text">Criar</span>
        </a>
    </h1>
    
    <table class="table table-dark table-hover">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">fotos</th>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Editar</th>
              <th scope="col">Detalhes</th>
            </tr>
        </thead>
        <tbody>
            
        @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>
                    <div class="circle">
                        @if ($user->image)
                            
                            <img src="{{ url('Image/'.$user->image) }}" alt="" class="btn-circle">
                            
                        @else
                            <img src="{{ url('assets/admin/img/no-image.png') }}" alt="{{ $user->name }}">
                        @endif
                    </div>
                    <td>{{ $user->name }}</td>
                </td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">Editar</a> 
                </td>
                <td>
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-success">Detalhes</a>
                </td>
            </tr>
        @endforeach
            
          </tbody>
    </table>

</div>
@endsection