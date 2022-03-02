@extends('admin._template')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-4 d-flex justify-content-center align-items-center mb-5">
                <img id="preview" width="80%">
            </div>
            <div class="col-lg-7">
                <h1 class="text-center">Upload portifolio User</h1>
                <hr>
                <form id="form" action="{{ route('admin.request.uploadStore') }}" method="post" data-type="JSON"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-1">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Título</label>
                                <input class="form-control" name="name" type="text" id="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="rates" class="form-label">Categoria</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">--</option>

                                    <option value="1">ff</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">Descrição da imagem</label>
                                <input class="form-control" name="description" type="textarea" id="description"
                                    style="height: 10rem;">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="price" class="form-label">Preço</label>
                                <input class="form-control" name="price" type="number" id="price" min="0"
                                    placeholder="R$">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="discount" class="form-label">Desconto</label>
                                <input class="form-control" name="discount" type="number" min="0" max="100" id="discount"
                                    placeholder="%">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="price_per_person" class="form-label">Preço por pessoa</label>
                                <input class="form-control" name="price_per_person" type="number" id="price_per_person"
                                    min="0" placeholder="R$">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="art" class="form-label">Selecione a imagem</label>
                                    <input class="form-control" name="art" type="file" id="art">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary btn-lg" type="submit">Cadastrar</button>
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
@endsection

@push('scripts')
    <script src="{{ asset('js/uploadImages.js') }}"></script>
@endpush
