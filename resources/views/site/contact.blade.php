@extends('site._template')
@section('content')
    <div class="row myt-2 mb-5 adjust">
        <div class="rol-md-4 col-sm-2 col-2"></div>
        <div class="rol-md-6 col-sm-8 col-8">
            <h1 class="text-center">Contato</h1>
            <hr>
            <form action="{{ route('contact.store') }}" method="POST" data-type="json">
                <div class="form-floating mb-3">
                    <input type="text" id="name" name="name" placeholder="Name" class="form-control form-control-sm">
                    <label for="name">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" id="email" name="email" placeholder="Email" class="form-control form-control-sm">
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="whatsapp" name="whatsapp" placeholder="Whatsapp" class="form-control form-control-sm">
                    <label for="whatsapp">Whatsapp</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="textarea" id="email_content" name="text_email" placeholder="Text" class="form-control"
                        style="height: 100px">
                    <label for="text_email">Mensagem</label>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <div class="d-none justify-content-center mt-2 load">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/contact.js') }}"></script>
@endpush
