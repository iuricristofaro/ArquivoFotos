@extends('admin.layouts.app')


@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
          Cutural
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $cultural->title }}</h5>
            <p class="card-text">{{ $cultural->text }}</p>
            <p class="card-text">{!!  html_entity_decode(substr($cultural->description, 450)) !!}</p>
            <p class="card-text">{{ $cultural->url }}</p>
            <p><img src="{{ url("cultural/{$cultural->image}") }}" alt="" class="btn-circle"></p>

            <div class="row">
                <div class="col-sm-1">
                <a href="{{ route('cultural.index') }}" class="btn btn-primary">Voltar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('cultural.destroy', $cultural->id) }}" method="POST">
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