@extends('admin.layouts.app')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
         <br>
        <a href="{{ route('virt.create') }}" class="btn btn-primary btn-icon-split">
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
              <th scope="col">URL</th>
              <th scope="col">Descrição</th>
              <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
            
        @foreach ($data as $inf)
            <tr>
                <th scope="row">{{ $inf->id }}</th>
                <td>{{ $inf->titulo }}</td>
                <td>{{ $inf->texto }}</td>
                <td>{{ $inf->url }}</td>
                <td>{!!  html_entity_decode(Str::of($inf->description)->words(40, '[...]')) !!}</td>
                {{-- <td>
                    <a href="{{ route('comments.edit', ['user' => $user->id, 'id' => $comment->id]) }}" class="btn btn-success">Editar</a> 
                </td> --}}
            </tr>
        @endforeach
            
          </tbody>
    </table>

</div>
<!-- /.container-fluid -->
@endsection