@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Imagens</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Imagem</a></li>
                    <li class="breadcrumb-item active">Imagens</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        @if (count($errors) > 0)
		<div class="row">
            <div class="col-12">
                <div class="card red darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Erros</span>
                        @foreach ($errors->all() as $message)
                            <li>{{$message}}</li>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('fotos.store') }}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            
                            <div class="form-group">
                                <label for="exampleInputFile">Carregar imagens</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" multiple name="imagem[]">
                                    <label class="custom-file-label" for="exampleInputFile">Arquivo</label>
                                  </div>
                                </div>
                              </div>
                            <button class="btn btn-primary">Adicionar</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection