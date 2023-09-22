
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Titulo</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $evento->title ?? old('title') }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Texto</label>
        <input type="text" name="text" class="form-control" id="exampleFormControlInput1"  value="{{ $evento->text ?? old('text') }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Titulo Blog</label>
        <input type="text" name="titulo" class="form-control" id="exampleFormControlInput1"  value="{{ $evento->titulo ?? old('texto') }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Texto Blog</label>
        <input type="text" name="texto" class="form-control" id="exampleFormControlInput1"  value="{{ $evento->texto ?? old('texto') }}">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Fotos</label>
        <input class="form-control" type="file" name="image" id="formFile">
    </div>

    <button class="btn btn-success">
        Enviar
    </button>

    <a class="btn btn-success" href="{{ url('admin/eventos') }}">Voltar</a>  


