@extends('admin.layouts.app')


@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">
        Historia <br>
        <a href="{{ route('historia.create') }}" class="btn btn-primary btn-icon-split">
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
              <th scope="col">imagem</th>
              <th scope="col">Facebook</th>
              <th scope="col">Instagram</th>
              <th scope="col">Nome</th>
              <th scope="col">Cargas</th>
              <th scope="col">Editar</th>
              <th scope="col">Detalhes</th>
            </tr>
        </thead>
        <tbody>
            
        @foreach ($historias as $historia)
            <tr>
                <th scope="row">{{ $historia->id }}</th>
                <td>
                    <div class="circle">
                        @if ($historia->image)
                            <img width="50" src="{{ url("historia/{$historia->image}") }}" alt="" class="btn-circle">
                            
                        @else
                            <img src="{{ asset("assets/admin/img/about.png") }}" alt="{{ $historia->name }}">
                        @endif
                    </div>
                    
                    
                </td>
                <td>{{ $historia->fb }}</td>
                <td>{{ $historia->instagram }}</td>
                <td>{{ $historia->name }}</td>
                <td>{{ $historia->carga }}</td>
                <td>
                    <a href="{{ route('historia.edit', $historia->id) }}" class="btn btn-success">Editar</a> 
                </td>
                <td>
                    <a href="{{ route('historia.show', $historia->id) }}" class="btn btn-success">Detalhes</a>
                </td>
            </tr>
        @endforeach
            
          </tbody>
    </table>
    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
        <ul class="pagination">
            
            <li> <span class="span">{!! $historias->links() !!}</span></li>
    
        </ul>
    </div>
</div>
@endsection