@extends('admin.layouts.app')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
          Horarios
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $horario->title }}</h5>
            <p class="card-text">{{ $horario->url }}</p>
            <p class="card-text">{!!  html_entity_decode(substr($horario->description, 450)) !!}</p>
            <p><img src="{{ url("horarios/{$horario->image}") }}" alt="" class="btn-circle"></p>

            <div class="row">
                <div class="col-sm-1">
                <a href="{{ route('horarios.index') }}" class="btn btn-primary">Voltar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('horarios.destroy', $horario->id) }}" method="POST">
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