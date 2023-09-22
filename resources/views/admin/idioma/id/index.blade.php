@extends('admin.layouts.app')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
         <br>
        <a href="{{ route('id.create') }}" class="btn btn-primary btn-icon-split">
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
            
        @foreach ($data as $id)
            <tr>
                <th scope="row">{{ $id->id }}</th>
                <td>{{ $id->title }}</td>
                <td>{{ $id->text }}</td>
                <td>{{ $id->url }}</td>
                <td>{!!  html_entity_decode(substr($id->description, 450)) !!}</td>
                <td>
                    <a href="{{ route('id.edit', $id->id) }}" class="btn btn-success">Editar</a> 
                </td>
            </tr>
        @endforeach
            
          </tbody>
    </table>

</div>
<!-- /.container-fluid -->
@endsection