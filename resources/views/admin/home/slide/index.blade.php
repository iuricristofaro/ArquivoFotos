@extends('admin.layouts.app')


@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Slide</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    
                    <a href="{{ route('slide.create') }}" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            +
                        </span>
                        <span class="text">Criar</span>
                    </a>
                </div>
        
                @if( Session::has('success') )
                <div class="alert alert-success hide-msg" style="float: left; width: 100%; margin: 10px 0px;">
                    {!! Session::get('success') !!}
                </div>
                @endif
                <div class="card-body">
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Texto</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">URL</th>
                            <th scope="col">imagem</th>
                            <th scope="col">Detalhes</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        @foreach ($data as $slide)
                            <tr>
                                <th scope="row">{{ $slide->id }}</th>
                                <td>{{ $slide->title }}</td>
                                <td>{{$slide->text}}</td>
                                <td>{!!  html_entity_decode(substr($slide->description, 550)) !!}</td>
                                <td>{{ $slide->url }}</td>
                                
                                <td><img width="50"  src="{{url('uploads/slide/'.$slide->image)}}" alt=""></td>
                               
                                <td>
                                    <a href="{{ route('slide.edit', $slide->id) }}" class="btn btn-success">Editar</a> 
                                    |
                                    <a href="{{ route('slide.show', $slide->id) }}" class="btn btn-success">Detalhes</a>
                                </td>
                            </tr>
                        @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                    <ul class="pagination">
                        
                        <li> <span class="span">{!! $data->links() !!}</span></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection