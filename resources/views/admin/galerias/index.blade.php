@extends('admin.layouts.app')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        Galeria de Fotos <br>
        <a href="{{ route('galerias.create') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                +
            </span>
            <span class="text">Criar</span>
        </a>
    </h1>
    
    <!-- DataTales Example -->
    <table class="table table-dark table-hover">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Texto</th>
              <th scope="col">imagem</th>
              <th scope="col">Editar</th>
              <th scope="col">Detalhes</th>
            </tr>
        </thead>
        <tbody>
            
        @foreach ($galerias as $galeria)
            <tr>
                <th scope="row">{{ $galeria->id }}</th>
                <td>{{ $galeria->text }}</td>
                <td>
                    <div class="circle">
                        @if ($galeria->image)
                            <img src="{{ url("galerias/{$galeria->image}") }}" alt="" class="btn-circle">
                            
                        @else
                            <img src="{{ asset("assets/admin/img/about.png") }}" alt="">
                        @endif
                    </div>
                </td>
                <td>
                    <a href="{{ route('galerias.edit', $galeria->id) }}" class="btn btn-success">Editar</a> 
                </td>
                <td>
                    <a href="{{ route('galerias.show', $galeria->id) }}" class="btn btn-success">Detalhes</a>
                </td>
            </tr>
        @endforeach
            
          </tbody>
    </table>

</div>
<!-- /.container-fluid -->
@endsection