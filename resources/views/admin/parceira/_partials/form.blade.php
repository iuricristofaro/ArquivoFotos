

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Titulo</label>
        <input type="text" name="titulo" class="form-control" id="exampleFormControlInput1"  value="{{ $date->titulo ?? old('titulo') }}">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Texto</label>
        <input type="text" name="texto" class="form-control" id="exampleFormControlInput1"  value="{{ $date->texto ?? old('texto') }}">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Fotos</label>
        <input class="form-control" type="file" name="image" id="formFile">
    </div>

    <br>
    <button class="btn btn-success">
        Enviar
    </button>

    <a class="btn btn-success" href="{{ url('admin/parceira') }}">Voltar</a>   


