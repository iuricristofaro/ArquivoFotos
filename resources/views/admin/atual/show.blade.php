@extends('admin.layouts.app')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
          Atual
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $atual->title }}</h5>
            <p class="card-text">{{ $atual->texto }}</p>
            <p class="card-text">{{ $atual->date }}</p>
            <p><img src="{{ url("uploads/atual/{$atual->image}") }}" alt="" class="btn-circle"></p>
            
            <p class="card-text">{{ $atual->link }}</p>

            <div class="row">
                <div class="col-sm-1">
                <a href="{{ route('atual.index') }}" class="btn btn-primary">Voltar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('atual.destroy', $atual->id) }}" method="POST">
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