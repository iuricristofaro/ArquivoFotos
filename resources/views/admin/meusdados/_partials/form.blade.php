
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nome</label>
        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nome:" value="{{ $user->name ?? old('name') }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="E-mail:" value="{{ $user->email ?? old('email') }}" disabled>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Fotos</label>
        <input class="form-control" type="file" name="image" id="formFile">
    </div>

    <button class="btn btn-success">
        Enviar
    </button>


