@extends('admin.layouts.app')


@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
          Horas
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $hora->title }}</h5>
            <p class="card-text">{{ $hora->text }}</p>
            <p class="card-text">{{ $hora->description }}</p>
            <p class="card-text">{!!  html_entity_decode(substr($hora->description, 450)) !!}</p>

            <div class="row">
                <div class="col-sm-1">
                <a href="{{ route('horas.index') }}" class="btn btn-primary">Voltar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('horas.destroy', $hora->id) }}" method="POST">
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
@endsection