@extends('site._template')

@section('content')
    <div class="container">
        <div class="row mt-5">

            <!-- Imagem do desenho -->
            <div class="col-md-8 col-sm-8 py-3 justify-content-center d-flex">
                <img src="{{Storage::url($art->directory)}}" class=" img-fluid" alt="...">
            </div>

            <!-- seção de compra -->
            <div class="col-md-4 col-sm-4 pt-3">
                <div class="container">
                    <form id="form-description" action="" data-type="JSON" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <h3><input type="hidden" name="name" value="{{ $art->name }}">{{ $art->name }}</h3>
                                <input type="hidden" name="art-id" id="art-id" value="{{ $art->id }}">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="price" value="{{ $art->price }}">
                                @if ($art->discount > 0)
                                    R$<span class="text-decoration-line-through"> {{ $art->price }} </span>
                                    <span class="badge bg-success ms-2">-{{ $art->discount }}% off</span>

                                    <h4>R$ <span id="total"> {{ number_format($art->discount, 2) }}</span> </h4>
                                    <input type="hidden" name="total" value="{{ number_format($art->discount, 2) }}">
                                @else
                                    <h4>R$ <span id="total"> {{ $art->price }}</span></h4>
                                    <input type="hidden" name="total" value="{{ $art->price }}">
                                @endif
                            </div>
                        </div>

                        <div class="row mt-3">
                            <span>Quantidade de pessoas e/ou animais <button type="button" class="btn btn-sm btn-primary"
                                    data-bs-html="true" data-bs-toggle="popover" data-bs-placement="right" title="Atenção"
                                    data-bs-content="A quantidade de pessoas escolhidas aqui é adicionada a quantidade existentes na arte;">
                                    <i class="fas fa-info-circle text-lg"></i>
                                </button></span>
                            <div class="col-md-6">
                                <input type="hidden" value="{{ $art->price_per_person }}" name="price_per_person">
                                <select name="number_people" id="number_people" class="form-select mt-2">
                                    <option value="0"> -- </option>
                                    <option value="1"> 1 </option>
                                    <option value="2"> 2 </option>
                                    <option value="3"> 3 </option>
                                    <option value="4"> 4 </option>
                                    <option value="5"> 5 </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-12">
                                <span class="">Observações sobre desenho: </span>

                                <div class="form-floating">
                                    <textarea class="form-control" name="note" placeholder="descricao" id="note"
                                        maxlength="160" style="height: 150px"></textarea>
                                    <label for="note">Descrição</label>
                                </div>
                                <p class="text-end">0/160</p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Foto modelo do cliente</label>
                                    <input class="form-control" name="model" type="file" id="model">
                                    <input type="hidden" name="section-model" value="2">
                                    <input type="hidden" name="category-model" value="3">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3"> Prazo de entrega: <strong>{{ round($quantityOrders / 2) }} dias
                                úteis</strong></div>
                        <input type="hidden" name="deadline" value="{{ round($quantityOrders / 2) }}">

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary btn-lg" type="submit">add carrinho</button>
                                    <div class="d-none justify-content-center mt-3 load">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="price" value="10">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#checkout" id="modal-checkout">
        Launch static backdrop modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="checkout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title " id="staticBackdropLabel">Pagamento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <body class="bg-light">
                        <div class="container">

                            <div class="py-5 text-center">
                                <h2>Checkout form</h2>
                                <p class="lead">Below is an example form built entirely with Bootstrap’s form
                                    controls. Each required form group has a validation state that can be triggered by
                                    attempting to submit the form without completing it.</p>
                            </div>

                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-4 col-sm-5 order-md-2 mb-4">
                                    <input type="hidden" name="request_id" value="" id="request_id">
                                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-muted">Carrinho</span>
                                        <span class="badge badge-secondary badge-pill">3</span>
                                    </h4>
                                    <ul class="list-group mb-3">
                                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                                            <div>
                                                <h6 class="my-0 checkout-art-name"></h6>
                                            </div>
                                            <h6 class="checkout-art-price"></h6>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between bg-light">
                                            <div>
                                                <h6 class="my-0">Pessoas</h6>
                                            </div>
                                            <h6 class="checkout-art-person"></h6>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between bg-light">
                                            <div class="text-success">
                                                <h6 class="my-0">Desconto</h6>
                                            </div>
                                            <span class="text-success checkout-art-discount"> - </span>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between">
                                            <strong>Total (BRL)</strong>
                                            <strong class="checkout-total">---</strong>
                                        </li>
                                    </ul>

                                    <!--<form class="card p-2">
                                                                <div class="input-group">
                                                                      <input type="text" class="form-control" placeholder="Promo code">
                                                                      <div class="input-group-append">
                                                                            <button type="submit" class="btn btn-secondary">Redeem</button>
                                                                      </div>
                                                                </div>
                                                          </form> -->
                                </div>
                                <div class="col-md-7 col-sm-7 order-md-1">
                                    <h4 class="mb-3">Billing address</h4>
                                    <form id="form-checkout" class="needs-validation" action="" data-type="JSON"
                                        method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-5 mb-3">
                                                <label for="first-name">First name</label>
                                                <input type="text" class="form-control" id="first-name" placeholder=""
                                                    name="first-name">
                                            </div>
                                            <div class="col-md-5 mb-3">
                                                <label for="last-name">Last name</label>
                                                <input type="text" class="form-control" id="last-name" placeholder=""
                                                    name="last-name">
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="mb-3">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" placeholder=""
                                                        name="email">

                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="ddd">DDD</label>
                                                    <input type="text" class="form-control" id="ddd" placeholder=""
                                                        name="ddd" maxlength="2">
                                                </div>

                                            </div>
                                            <div class="col-md-7">
                                                <div class="mb-3">
                                                    <label for="phone">Telefone</label>
                                                    <input type="text" class="form-control" id="phone" placeholder=""
                                                        name="phone">

                                                </div>

                                            </div>
                                        </div>

                                        <!--<div class="row">
                                                                      <div class="col-md-7 mb-3">
                                                                            <label for="address">Rua</label>
                                                                            <input type="text" class="form-control" id="street" placeholder="" name="street">

                                                                      </div>
                                                                      <div class="col-md-3 mb-3">
                                                                            <label for="number">Numero</label>
                                                                            <input type="text" class="form-control" id="number" name="number">

                                                                      </div>
                                                                </div>

                                                                <div class="row">

                                                                      <div class="col-md-10 mb-3">
                                                                            <label for="district">Bairro</label>
                                                                            <input type="text" class="form-control" id="district" placeholder="" name="district">
                                                                      </div>
                                                                </div>

                                                                <div class="row">
                                                                      <div class="col-md-10 mb-3">
                                                                            <label for="city">Cidade</label>
                                                                            <input type="text" class="form-control" id="city" placeholder="" name="city">

                                                                      </div>
                                                                </div>

                                                                <div class="row">
                                                                      <div class="col-md-4 mb-3">
                                                                            <label for="state">Estado</label>
                                                                            <select class="form-control" class="custom-select d-block w-100" id="state" name="state">
                                                                                  <option value="">--</option>
                                                                                  <option value="AL">Alagoas</option>
                                                                            </select>

                                                                      </div>
                                                                      <div class="col-md-6 mb-3">
                                                                            <label for="zip">Cep</label>
                                                                            <input type="text" class="form-control" id="zip" placeholder="" name="zip">

                                                                      </div>
                                                                </div> -->


                                        <!-- <hr class="mb-4">
                                                                <div class="custom-control custom-checkbox">
                                                                      <input type="checkbox" class="custom-control-input" id="same-address">
                                                                      <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox">
                                                                      <input type="checkbox" class="custom-control-input" id="save-info">
                                                                      <label class="custom-control-label" for="save-info">Save this information for next time</label>
                                                                </div> -->
                                        <div class="col d-flex justify-content-center">
                                            <button type="button" class="btn btn-primary" id="generate-invoice">Gerar Meio
                                                de Pagamento</button>
                                        </div>

                                        <hr class="mb-4">

                                        <!-- --------------------------------------------------------------------------------------------------------------------------------------             -->

                                        <h4 class="mb-3">Pagamento</h4>

                                        <div id="ppplus">
                                        </div>

                                        <div class="d-grid gap-2">
                                            <button type="submit" id="continueButton" class="btn btn-primary"> Checkout
                                            </button>
                                        </div>
                                        <div class="d-none justify-content-center mt-3 load" id="load">
                                            <div class="spinner-border text-primary" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>

                                        <!-- <div class="d-block my-3">
                                                                      <div class="custom-control custom-radio">
                                                                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" value="creditCard">
                                                                            <label class="custom-control-label" for="credit">Crédito</label>
                                                                      </div>
                                                                      <div class="custom-control custom-radio">
                                                                            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" value="eft">
                                                                            <label class="custom-control-label" for="debit">Débito</label>
                                                                      </div>
                                                                      <div class="custom-control custom-radio">
                                                                            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                                                                            <label class="custom-control-label" for="paypal">PayPal</label>
                                                                      </div>
                                                                </div>
                                                                <div class="row">
                                                                      <div class="col-md-10 mb-3">
                                                                            <label for="cc-name">Nome do cartão</label>
                                                                            <input type="text" class="form-control" id="cc-name" placeholder="" name="cc-name">
                                                                      </div>

                                                                </div>
                                                                <div class="row">
                                                                      <div class="col-md-10 mb-3">
                                                                            <label for="cpf">cpf</label>
                                                                            <input type="text" class="form-control" id="cpf" placeholder="" name="cpf" maxlength="11">
                                                                      </div>
                                                                </div>
                                                                <div class="row">
                                                                      <div class="col-md-10 mb-3">
                                                                            <label for="cc-number">Numero do cartão</label>
                                                                            <input type="text" class="form-control cc-number" id="cc-number" name="cc-number" placeholder="" maxlength="16">
                                                                      </div>
                                                                </div>

                                                                <div class="row">
                                                                      <div class="col-md-5 mb-3">
                                                                            <label for="cc-expiration">Expiração</label>
                                                                            <input type="text" class="form-control" name="cc-expiration" id="cc-expiration" placeholder="">
                                                                      </div>
                                                                      <div class="col-md-5 mb-3">
                                                                            <label for="cc-cvv">CVV</label>
                                                                            <input type="text" class="form-control" id="cc-cvv" placeholder="" name="cc-cvv">

                                                                      </div>
                                                                </div>

                                                                <div class="row">
                                                                      <div class="col-md-10 mb-3">
                                                                            <label for="installments">Parcelas</label>
                                                                            <select class="form-control" id="installments" name="installments">
                                                                                  <option value="">--</option>
                                                                            </select>
                                                                      </div>

                                                                </div>

                                                                <hr class="mb-4">
                                                                <div class="d-grid">
                                                                      <button class="btn btn-primary btn-lg" type="submit">Finalizar compra</button>
                                                                      <div class="d-none justify-content-center mt-3 load">
                                                                            <div class="spinner-border text-primary" role="status">
                                                                                  <span class="visually-hidden">Loading...</span>
                                                                            </div>
                                                                      </div>
                                                                </div> -->
                                    </form>
                                </div>
                            </div>

                            <footer class="my-5 pt-5 text-muted text-center text-small">
                                <p class="mb-1">&copy; 2017-2020 Company Name</p>
                                <ul class="list-inline">
                                    <li class="list-inline-item"><a href="#">Privacy</a></li>
                                    <li class="list-inline-item"><a href="#">Terms</a></li>
                                    <li class="list-inline-item"><a href="#">Support</a></li>
                                </ul>
                            </footer>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Comprar</button>
                </div>
            </div>
        </div>

    </div>

    <br><br><br><br><br><br><br><br>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Launch static backdrop modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ asset('js/orders.js') }}"></script>
@endpush
