@extends('site._template')
@section('content')
    <div class="container">
        <h3 class="text-center mt-3">Loja</h3>
        <hr>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 gy-2">
            @if (isset($arts))
                @foreach ($arts as $art)
                    <div class="col {{ $art->id }} ">
                        <div class="card h-100">
                            <img src="{{ Storage::url($art->directory) }}" class="card-img" alt="{{ $art->name }}">
                              <!--@if ($art->discount > 0)
                                    <div class="card-img-overlay">
                                          <span class="badge bg-success ms-2">-{{ $art->discount }}% off</span>
                                    </div>
                              @endif -->
                            <div class="card-body py-0">
                                @if ($art->discount > 0)
                                    <span class="text-decoration-line-through me-2">R$ {{ $art->price }} </span><span
                                        class="badge bg-success">-{{ $art->discount }}% off</span>
                                @endif;
                                <h5 class="card-title">{{ ucfirst($art->name) }}</h5>
                                <p class="card-text">{{ ucfirst($art->description) }}</p>
                            </div>
                            <div
                                class="card-footer bg-transparent border-top-0 d-flex justify-content-between align-items-center">
                                <!-- ----------------------- resolver o problema da unção de desconto do h5 ----------------- -->
                                <h5 class="d-flex align-items-center">R$ {{ number_format($art->discount, 2) }}</h5>
                                <!--<a href="#" class="btn btn-primary text-center mb-2 delete" data-action="" data-id="{{ $art->id }}">Delete
                                                  </a> -->
                                <a href="{{ route('web.artSell', ['artName' => str_replace(' ', '-', $art->name)]) }}"
                                    class="btn btn-primary btn-sm text-center mb-2 ">Comprar!
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/store.js') }}"></script>
@endpush
