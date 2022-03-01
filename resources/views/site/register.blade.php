@extends('site._template')

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-md-2 col-lg-2"></div>
            <div class="col-md-8 col-lg-8 py-5">
                <h1 class="text-center">Register</h1>
                <div class="">
                    <form action="{{ route('user.store') }}" method="POST" data-type="json">
                        @csrf
                        <div class="row my-3">
                            <div class="col-md-6 col-lg-7">
                                <label for="name">Nome: </label>
                                <input type="text" name="name" id="name" class="form-control form-control"
                                    placeholder="Ex: Fulano da Silva">
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <label for="cpf">CPF: </label>
                                <input type="text" name="cpf" id="cpf" class="form-control form-control" maxlength="14"
                                    placeholder="Ex: 000.000.000-00">
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-md-4 col-lg-4">
                                <label for="name">Email: </label>
                                <input type="email" name="email" id="email" class="form-control form-control"
                                    placeholder="fulano@fulano.com">
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <label for="nick">Nick: </label>
                                <input type="text" name="nick" id="nick" class="form-control form-control" maxlength="16"
                                    placeholder="Ex: NovoUsuario">
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-md-4 col-lg-4">
                                <label for="password">Password: </label>
                                <input type="password" name="password" id="password" class="form-control form-control"
                                    placeholder="">
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <label for="repeat_password">Repita senha: </label>
                                <input type="password" name="repeat_password" id="repeat_password"
                                    class="form-control form-control" placeholder="">
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-md-2 col-lg-3"></div>
                            <div class="col-md-6 col-lg-6">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
                                    <div class="d-none justify-content-center mt-3 load">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/register.js') }}"></script>
@endpush
