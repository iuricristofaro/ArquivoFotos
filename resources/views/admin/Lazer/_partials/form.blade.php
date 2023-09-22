
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Titulo</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $lazer->title ?? old('title') }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Texto</label>
        <input type="text" name="text" class="form-control" id="exampleFormControlInput1"  value="{{ $lazer->text ?? old('text') }}">
    </div>
    
    <div class="mb-3">
        <label for="formFile" class="form-label">Fotos</label>
        <input class="form-control" type="file" name="image" id="formFile">
    </div>

    <button class="btn btn-success">
        Enviar
    </button>

    <a class="btn btn-success" href="{{ url('admin/lazer') }}">Voltar</a>  


