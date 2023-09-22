@extends('admin.layouts.app')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        Eventos <br>
        <a href="{{ route('eventos.create') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                +
            </span>
            <span class="text">Criar</span>
        </a>
    </h1>
    
    <!-- DataTales Example -->
    <table class="table table-dark table-hover">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Titulo</th>
              <th scope="col">Texto</th>
              <th scope="col">Titulo Blog</th>
              <th scope="col">Texto Blog</th>
              <th scope="col">imagem</th>
              <th scope="col">Editar</th>
              <th scope="col">Detalhes</th>
            </tr>
        </thead>
        <tbody>
            
        @foreach ($eventos as $evento)
            <tr>
                <th scope="row">{{ $evento->id }}</th>
                <td>{{ $evento->title }}</td>
                <td>{{ $evento->text }}</td>
                <td>{{ $evento->titulo }}</td>
                <td>{{ $evento->texto }}</td>
                <td>
                    <div class="circle">
                        @if ($evento->image)
                            <img src="{{ url("eventos/{$evento->image}") }}" alt="" class="btn-circle">
                            
                        @else
                            <img src="{{ asset("assets/admin/img/about.png") }}" alt="{{ $evento->name }}">
                        @endif
                    </div>
                </td>
                <td>
                    <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-success">Editar</a> 
                </td>
                <td>
                    <a href="{{ route('eventos.show', $evento->id) }}" class="btn btn-success">Detalhes</a>
                </td>
            </tr>
        @endforeach
            
          </tbody>
    </table>

</div>
<!-- /.container-fluid -->
@endsection