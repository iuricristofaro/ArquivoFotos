@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <h1 class="title">
        Roles: <b>{{$permission->name}}</b>
    </h1>

    <table class="table table-dark table-hover">
        <tr>
            <th>Name</th>
            <th>Label</th>
            <th>Ações</th>
        </tr>

        @forelse( $roles as $role )
        <tr>
            <td>{{$role->name}}</td>
            <td>{{$role->label}}</td>
            <td>
                <a href="{{url("/admin/role/$role->id/delete")}}" class="delete">
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