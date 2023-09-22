@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Imagem</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Imagem</a></li>
                    <li class="breadcrumb-item active">Excluídas</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                  <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Título</th>
                                    <th>Descrição</th>
                                    <th>Imagem</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($registros as $registro)
                                <tr>
                                    <td>{{ $registro->id }}</td>
                                    <td>{{ $registro->titulo }}</td>
                                    <td>{{ $registro->descricao }}</td>
                                    <td><img width="50"  src="{{$registro->galeriaUrl()}}" alt="{{$registro->titulo}}"></td>
                                    <td>


                                        <form action="{{route('imagem.recupera',$registro->id)}}" method="post">
                                            
                                            {{ method_field('PUT') }}
                                            {{ csrf_field() }}
                                            <button title="Recuperar" class="btn btn-success btn-sm"><i class="fas fa-sync-alt"></i></button>
                                           
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                 
                    <div class="card-body">
                        {{ $registros->links() }}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection