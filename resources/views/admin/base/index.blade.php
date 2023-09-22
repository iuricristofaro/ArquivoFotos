@extends('admin.layouts.app')


@section('content')

<div class="container-fluid">

    
    <h1 class="h3 mb-2 text-gray-800">
        Categorias de Base <br>
        <a href="{{ route('base.create') }}" class="btn btn-primary btn-icon-split">
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
              <th scope="col">Titulo Blog</th>
              <th scope="col">Texto Blog</th>
              <th scope="col">imagem</th>
              <th scope="col">Editar</th>
              <th scope="col">Detalhes</th>
            </tr>
        </thead>
        <tbody>
            
        @foreach ($bases as $base)
            <tr>
                <th scope="row">{{ $base->id }}</th>
                <td>{{ $base->title }}</td>
                <td>{{ $base->text }}</td>
                <td>{{ $base->titulo }}</td>
                <td>{{ $base->texto }}</td>
                <td>
                    <div class="circle">
                        @if ($base->image)
                            <img width="50" src="{{ url("base/{$base->image}") }}" alt="" class="btn-circle">
                            
                        @else
                            <img src="{{ asset("assets/admin/img/about.png") }}" alt="{{ $base->name }}">
                        @endif
                    </div>
                </td>
                <td>
                    <a href="{{ route('base.edit', $base->id) }}" class="btn btn-success">Editar</a> 
                </td>
                <td>
                    <a href="{{ route('base.show', $base->id) }}" class="btn btn-success">Detalhes</a>
                </td>
            </tr>
        @endforeach
            
          </tbody>
    </table>
    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
        <ul class="pagination">
            
            <li> <span class="span">{!! $bases->links() !!}</span></li>
    
        </ul>
    </div>
</div>

@endsection