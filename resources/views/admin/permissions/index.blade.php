@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <h1 class="title">
        Lists Permissions
    </h1>

    <table class="table table-dark table-hover">
        <tr>
            <th>Name</th>
            <th>Label</th>
            <th width="150px">Ações</th>
        </tr>

        @forelse( $permissions as $permission )
        <tr>
            <td>{{$permission->name}}</td>
            <td>{{$permission->label}}</td>
            <td>
                <a href="{{url("/admin/permission/$permission->id/roles")}}" class="permission">
                    <i class="fa fa-unlock"></i>
                </a>
                <a href="{{url("/admin/permission/$permission->id/edit")}}" class="edit">
                    <i class="fa fa-pencil-square-o"></i>
                </a>
                <a href="{{url("/admin/permission/$permission->id/delete")}}" class="delete">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="90">
                <p>Nenhum Resultado!</p>
            </td>
        </tr>
        @endforelse
    </table>

</div>

@endsection