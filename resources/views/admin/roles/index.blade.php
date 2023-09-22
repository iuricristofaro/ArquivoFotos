@extends('admin.layouts.app')


@section('content')

<div class="container-fluid">

    
    <h1 class="h3 mb-2 text-gray-800">
        Lista de Roles <br>
        <a href="{{ route('roles.create') }}" class="btn btn-primary btn-icon-split">
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
                <th>Nome</th>
			    <th>Descrição</th>
				<th>Ação</th>
            </tr>
        </thead>
        <tbody>
            
        @foreach($roles as $role)
            <tr>
                <th scope="row">{{ $role->id }}</th>
                <td>{{ $role->name }}</td>
                <td>{{ $role->label }}</td>
                <td>
                    <a title="Editar" class="btn btn-success" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                    |
                    <form action="{{route('roles.destroy',$role->id)}}" method="post">
                       
                        
                        
                       
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button title="Deletar" class="btn btn-danger">Delete</button>
                        
                    </form>

                    <a href="{{url("/admin/role/$role->id/permissions")}}" class="permission">
                        <i class="fa fa-lock"></i>
                    </a>
    
                </td>
            </tr>
        @endforeach
            
          </tbody>
    </table>
    {{-- <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
        <ul class="pagination">
            
            <li> <span class="span">{!! $olimpicos->links() !!}</span></li>
    
        </ul>
    </div> --}}
</div>

@endsection