@extends('admin.layouts.app')


@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">
        Lazer <br>
        <a href="{{ route('lazer.create') }}" class="btn btn-primary btn-icon-split">
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
              <th scope="col">imagem</th>
              <th scope="col">Editar</th>
              <th scope="col">Detalhes</th>
            </tr>
        </thead>
        <tbody>
            
        @foreach ($lazers as $lazer)
            <tr>
                <th scope="row">{{ $lazer->id }}</th>
                <td>{{ $lazer->title }}</td>
                <td>{{ $lazer->text }}</td>
                <td>
                    <div class="circle">
                        @if ($lazer->image)
                            <img width="50" src="{{ url("lazer/{$lazer->image}") }}" alt="" class="btn-circle">
                            
                        @else
                            <img src="{{ asset("assets/admin/img/about.png") }}" alt="{{ $lazer->name }}">
                        @endif
                    </div>
                </td>
                <td>
                    <a href="{{ route('lazer.edit', $lazer->id) }}" class="btn btn-success">Editar</a> 
                </td>
                <td>
                    <a href="{{ route('lazer.show', $lazer->id) }}" class="btn btn-success">Detalhes</a>
                </td>
            </tr>
        @endforeach
            
          </tbody>
    </table>
    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
        <ul class="pagination">
            
            <li> <span class="span">{!! $lazers->links() !!}</span></li>
    
        </ul>
    </div>
</div>
@endsection