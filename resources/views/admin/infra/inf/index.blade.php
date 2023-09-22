@extends('admin.layouts.app')


@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">
         <br>
        <a href="{{ route('inf.create') }}" class="btn btn-primary btn-icon-split">
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
                <td>{!!  html_entity_decode(substr($inf->description, 450)) !!}</td>
                <td>
                    <a href="{{ route('inf.edit', $inf->id) }}" class="btn btn-success">Editar</a> 
                </td>
                <td>
                    <a href="{{ route('inf.show', $inf->id) }}" class="btn btn-success">Detalhes</a>
                </td>
            </tr>
        @endforeach
            
          </tbody>
    </table>
    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
        <ul class="pagination">
            
            <li> <span class="span">{!! $data->links() !!}</span></li>

        </ul>
    </div>
</div>
@endsection