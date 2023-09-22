@extends('admin.layouts.app')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
         <br>
        <a href="{{ route('eve.create') }}" class="btn btn-primary btn-icon-split">
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
            
        @foreach ($data as $eve)
            <tr>
                <th scope="row">{{ $eve->id }}</th>
                <td>{{ $eve->title }}</td>
                <td>{{ $eve->text }}</td>
                <td>{{ $eve->url }}</td>
                <td>{!!  html_entity_decode(substr($eve->description, 450)) !!}</td>
                <td>
                    <a href="{{ route('eve.edit',$eve->id) }}" class="btn btn-success">Editar</a> 
                </td>
            </tr>
        @endforeach
            
          </tbody>
    </table>

</div>
<!-- /.container-fluid -->
@endsection