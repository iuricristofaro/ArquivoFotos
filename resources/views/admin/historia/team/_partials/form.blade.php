
    <div class="mb-3">
        <label  class="form-label">Titulo</label>
        <input type="text" name="titulo" class="form-control"   value="{{ $data->titulo ?? old('titulo') }}">
    </div>
    <div class="mb-3">
        <label  class="form-label">Texto</label>
        <input type="text" name="texto" class="form-control"   value="{{ $data->texto ?? old('texto') }}">
    </div>
    

    <button class="btn btn-success">
        Enviar
    </button>

    <a class="btn btn-success" href="{{ url('admin/team') }}">Voltar</a>   


