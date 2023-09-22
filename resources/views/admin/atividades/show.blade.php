@extends('admin.layouts.app')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
          Atividades
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $data->title }}</h5>
            <p class="card-text">{{ $data->texto }}</p>
            <p class="card-text">{{ $data->titulo }}</p>
            <p class="card-text">{{ $data->texto }}</p>
            <p><img src="{{ url("atividades/{$data->image}") }}" alt="" class="btn-circle"></p>

            <div class="row">
                <div class="col-sm-1">
                <a href="{{ route('atividades.index') }}" class="btn btn-primary">Voltar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('atividades.destroy', $data->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection