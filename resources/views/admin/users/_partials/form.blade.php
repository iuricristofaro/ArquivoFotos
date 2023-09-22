
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nome</label>
        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ $user->name ?? old('name') }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="{{ $user->email ?? old('email') }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Senha</label>
        <input type="password" name="password" class="form-control" id="exampleFormControlInput1">
    </div>

    <button class="btn btn-success">
        Enviar
    </button>

    <a class="btn btn-success" href="{{ url('admin/usuarios') }}">Voltar</a>
