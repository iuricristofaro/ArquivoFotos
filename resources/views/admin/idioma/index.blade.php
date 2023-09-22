@extends('admin.layouts.app')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        Idioma <br>
        <a href="{{ route('idioma.create') }}" class="btn btn-primary btn-icon-split">
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
            
        @foreach ($idiomas as $idioma)
            <tr>
                <th scope="row">{{ $idioma->id }}</th>
                <td>{{ $idioma->title }}</td>
                <td>{{ $idioma->text }}</td>
                <td>{{ $idioma->titulo }}</td>
                <td>{{ $idioma->texto }}</td>
                <td>
                    <div class="circle">
                        @if ($idioma->image)
                            <img width="50" src="{{ url("idioma/{$idioma->image}") }}" alt="" class="btn-circle">
                            
                        @else
                            <img src="{{ asset("assets/admin/img/about.png") }}" alt="{{ $idioma->name }}">
                        @endif
                    </div>
                </td>
                <td>
                    <a href="{{ route('idioma.edit', $idioma->id) }}" class="btn btn-success">Editar</a> 
                </td>
                <td>
                    <a href="{{ route('idioma.show', $idioma->id) }}" class="btn btn-success">Detalhes</a>
                </td>
            </tr>
        @endforeach
            
          </tbody>
    </table>

</div>
<!-- /.container-fluid -->
@endsection