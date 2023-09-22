@extends('admin.layouts.app')


@section('content')

<div class="container-fluid">

    
    <h1 class="h3 mb-2 text-gray-800">
         <br>
        <a href="{{ route('jobs.create') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                +
            </span>
            <span class="text">Criar</span>
        </a>
    </h1>
    
    @if( Session::has('success') )
    <div class="alert alert-success hide-msg" style="float: left; width: 100%; margin: 10px 0px;">
        {!! Session::get('success') !!}
    </div>
    @endif
    <table class="table table-dark table-hover">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Titulo</th>
              <th scope="col">Texto</th>
              <th scope="col">URL</th>
              <th scope="col">Descrição</th>
              <th scope="col">Editar</th>
              <th scope="col">Detalhes</th>
            </tr>
        </thead>
        <tbody>
            
        @foreach ($data as $jobs)
            <tr>
                <th scope="row">{{ $jobs->id }}</th>
                <td>{{ $jobs->title }}</td>
                <td>{{ $jobs->text }}</td>
                <td>{{ $jobs->url }}</td>
                <td>{!!  html_entity_decode(substr($jobs->description, 450)) !!}</td>
                <td>
                    <a href="{{ route('jobs.edit', $jobs->id) }}" class="btn btn-success">Editar</a> 
                </td>
                <td>
                    <a href="{{ route('jobs.show', $jobs->id) }}" class="btn btn-success">Detalhes</a> 
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