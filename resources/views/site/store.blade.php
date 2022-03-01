@extends('site._template')
@section('content')
<div class="container">
      <h3 class="text-center mt-3">Loja</h3>
      <hr>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 gy-2">
            <?php if (isset($images)) :  ?>
                  <?php foreach ($images as $image) : ?>
                        <div class="col <?= $image->id ?>">
                              <div class="card h-100">
                                    <img src="<?= url($image->directory); ?>" class="card-img" alt="...">
                                    <!--<?php if ($image->discount > 0) : ?>
                                          <div class="card-img-overlay">
                                                <span class="badge bg-success ms-2">-<?= $image->discount; ?>% off</span>
                                          </div>
                                    <?php endif; ?> --> 
                                    <div class="card-body py-0 ">
                                          <?php if ($image->discount > 0) : ?>
                                                <span class="text-decoration-line-through me-2">R$ <?= $image->price; ?> </span><span class="badge bg-success">-<?= $image->discount; ?>% off</span>
                                          <?php endif; ?>
                                          <h5 class="card-title"><?= ucfirst($image->name); ?></h5>
                                          <p class="card-text"><?= ucfirst($image->description); ?></p>
                                    </div>
                                    <div class="card-footer bg-transparent border-top-0 d-flex justify-content-between align-items-center">
                                          <h5 class="d-flex align-items-center">R$ <?= number_format($image->discountedValue(), 2); ?></h5>
                                          <!--<a href="#" class="btn btn-primary text-center mb-2 delete" data-action="<?= $router->route('art.request.deleteImage') ?>" data-id="<?= $image->id ?>">Delete
                                          </a> -->
                                          <a href="<?= $router->route('art.web.artDescription', ["artName" => str_replace(' ', '-', $image->name)]); ?>" class="btn btn-primary btn-sm text-center mb-2 ">Comprar!
                                          </a>
                                    </div>
                              </div>
                        </div>
                  <?php endforeach ?>
            <?php endif; ?>  
      </div>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('js/store.js') }}"></script>
@endpush
