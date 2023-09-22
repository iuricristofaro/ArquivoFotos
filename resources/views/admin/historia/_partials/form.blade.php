
    <div class="mb-3">
        <label for="formFile" class="form-label">Fotos</label>
        <input class="form-control" type="file" name="image" id="formFile">
    </div>
    <div class="mb-3">
        <label class="form-label">Facebook Link Atenção preciso "/Nome ou Codigo"</label>
        <input type="text" name="fb" class="form-control" value="{{ $historia->fb ?? old('fb') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Instagram Link Atenção preciso "/Nome ou Codigo"</label>
        <input type="text" name="instagram" class="form-control"  value="{{ $historia->instagram ?? old('instagram') }}">
    </div>

    <div class="mb-3">
        <label  class="form-label">Nome Completo</label>
        <input type="text" name="name" class="form-control" value="{{ $historia->name ?? old('name') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Carga</label>
        <input type="text" name="carga" class="form-control" value="{{ $historia->carga ?? old('carga') }}">
    </div>


    <button class="btn btn-success">
        Enviar
    </button>

    <a class="btn btn-success" href="{{ url('admin/historia') }}">Voltar</a>


