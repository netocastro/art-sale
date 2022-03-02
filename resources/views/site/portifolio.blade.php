@extends('site._template')
@section('content')
    <div class="container">
        
        <img src="{{Storage::url('arts/aa.jpg')}}" alt="">
        <h3 class="text-center mt-3">Portifólio</h3>
        <hr>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 gy-2">
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('storage/manga/image1.jfif') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nami Hartford</h5>
                        <p class="card-text">Personagem do manga ... que vai ser lançado em novembro desse ano.</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('storage/manga/image9.jfif') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Mago da Vara Cumprida</h5>
                        <p class="card-text">Feiticeiro matador de Monstros cabeludos.</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('storage/manga/image3.jfif') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Matador de Politicos</h5>
                        <p class="card-text">Ele procura politicos corruptos e mata... Se cuida Luladrão!</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('storage/manga/image4.jfif') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Espadachin Renegado</h5>
                        <p class="card-text">Personagem expulso da sua vila após matar seu mestre.</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('storage/manga/image5.jfif') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Takavara No Skate</h5>
                        <p class="card-text">Lutador que gosta de esportes radicais.</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('storage/manga/image6.jfif') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Punheta Giratoria</h5>
                        <p class="card-text">Possui os movimentos mais rápidos com a mão, o resto vc imagina...</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('storage/manga/image7.jfif') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Itachi 2.0</h5>
                        <p class="card-text">Personagem mais foda que existe, aguardem!</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/portifolioUSer.js') }}"></script>
@endpush
