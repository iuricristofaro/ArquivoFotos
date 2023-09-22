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
                    <li class="breadcrumb-item active">Imagem</li>
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
                    <a href="{{route('fotos.creategaleria', $foto)}}" class="btn btn-primary">Adicionar</a>
                  </div>
                  <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Imagem</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($imagens as $registro)
                                <tr>
                                    <td>{{ $registro->id }}</td>
                                    <td><img width="50"  src="upload/{{$registro->image}}" alt=""></td>
                                    <td>


                                      
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                 
                    <div class="card-body">
                        {{ $imagens->links() }}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection