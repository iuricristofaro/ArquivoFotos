@extends('admin.layouts.app')


@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            Infraestrutura
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $infra->title }}</h5>
            <h5 class="card-text">{{ $infra->text }}</h5> <br>
            <p><img src="{{ url("uploads/infra/{$infra->image}") }}" alt="" class="btn-circle"></p>

            <div class="row">
                <div class="col-sm-1">
                <a href="{{ route('infra.index') }}" class="btn btn-primary">Voltar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('infra.destroy', $infra->id) }}" method="POST">
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