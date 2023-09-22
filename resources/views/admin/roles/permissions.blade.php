@extends('admin.layouts.app')


@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">
        Usuários e Lista do Papel<br>
        
    </h1>
    
    <div class="card mb-4 col-lg-3">

        <div class="card-body">
            {{-- <form action="{{url('role.permissions.store',$role->id)}}" method="post">
            {{ csrf_field() }}
            <div class="input-field mb-2">
                <select name="papel_id">
                    @foreach($permissions as $valor)
                    <option value="{{$valor->id}}">{{$valor->name}}</option>
                    @endforeach
                </select>
            </div>
                <button class="btn btn-success">Adicionar</button>
            </form> --}}

        </div>
    </div>
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Role</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach( $permissions as $permission )
                <tr>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->label }}</td>

                    {{-- <td>

                        <form action="{{route('role.permissao.destroy',[$papel->id,$permissao->id])}}" method="post">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button title="Deletar" class="btn btn-danger">Delete</button>
                        </form>
                    </td> --}}
                </tr>
            @endforeach
            
          </tbody>
    </table>

</div>
@endsection