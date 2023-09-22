@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Fotos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Fotos</li>
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
                  <div class="card-header">
                        <a href="{{route('galeria.create')}}" class="btn btn-primary">Adicionar</a>

                        {{-- <a href="{{route('imagem.excluidas')}}" class="btn btn-danger">Excluídas</a> --}}
                  </div>
                  <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Título</th>
                                    <th>Descrição</th>
                                    <th>Url</th>
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
                                    <td>{{ $registro->url }}</td>
                                    <td><img width="50"  src="{{url('uploads/fotos/'.$registro->image)}}" alt=""></td>
                                    <td>


                                        <form action="{{route('galeria.destroy',$registro->id)}}" method="post">
                                            
                                            <a title="Editar" class="btn btn-info btn-sm" href="{{ route('galeria.edit',$registro->id) }}"><i class="fas fa-pencil-alt"></i></a>

                                            <a title="Imagem" class="btn btn-success btn-sm" href="{{ route('imagens',$registro->id) }}"><i class="fas fa-image"></i></a>
            
                                            
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button title="Deletar" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                           
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                 
                    <div class="card-body">
                        {{-- {{ $registros->links() }} --}}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection