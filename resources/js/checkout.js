$(document).ready(function () {
      let creditCardToken;
      let brandCard;
      let senderHash;
      let installment; //parcelamento
      let installmentQuantity; // Quantidade_de_parcelas_escolhida
      let installmentValue; //Valor das parcelas obtidas no serviço de opções de parcelamento.
      //let noInterestInstallmentQuantity = '2';//quantidade de parcela sem juros. Colocar variavel de forma dinamica depois;

      if (sessionId) {  
            PagSeguroDirectPayment.setSessionId(sessionId);

            PagSeguroDirectPayment.onSenderHashReady(function (response) {
                  if (response.status == 'error') {
                        console.log(response.message);
                        return false;
                  }
                  senderHash = response.senderHash;
                  console.log(' HASH: ' + senderHash);
            });

            $('#cc-number').on('keyup', function () {

                  if ($('#cc-number').val().length >= 6) {

                        PagSeguroDirectPayment.getBrand({
                              cardBin: $('#cc-number').val(),
                              success: function (responseBrand) {
                                    
                                    $('#cc-number').removeClass();
                                    brandCard = responseBrand.brand.name;
                                    $('#cc-number').addClass(brandCard);
                                    
                                    console.log('brandCard: ' + brandCard);
                                    $('.card-logo').remove();
                                    $('#cc-number').after(`<img class="card-logo" width="100" src="https://stc.pagseguro.uol.com.br${creditCards[creditCard].images.SMALL.path}">`);
                              },
                              error: function (responseBrand) {
                                    console.log("response brand: " + responseBrand);
                                    return;
                              },
                              complete: function (responseBrand) {
                                    //tratamento comum para todas chamadas
                              }
                        });

                  }
                  if ($('#cc-number').val().length < 6) {
                        $('.card-logo').remove();
                  }

                  if ($('#cc-number').val().length == 16) {

                        PagSeguroDirectPayment.getPaymentMethods({
                              //amount: 500.00,
                              success: function (responseMethods) {
                                    let creditCards = responseMethods.paymentMethods.CREDIT_CARD.options;
                                    for (creditCard in creditCards) {
                                          if (creditCard == brandCard.toUpperCase()) {
                                                console.log(creditCards);
                                                $('.card-logo').remove();
                                                $('#cc-number').after(`<img class="card-logo" width="100" src="https://stc.pagseguro.uol.com.br${creditCards[creditCard].images.SMALL.path}">`);
                                                PagSeguroDirectPayment.getInstallments({
                                                      amount: parseFloat($('#total').html()).toFixed(2),
                                                      maxInstallmentNoInterest: 2,
                                                      brand: brandCard.toLowerCase(),
                                                      success: function (responseInstallments) {

                                                            installment = responseInstallments.installments[brandCard.toLowerCase()];
                                                            console.log(installment);
                                                            console.log('------------------------------');
                                                            $('#installments').append(`<option value="">--</option>`);
                                                           
                                                            installment.forEach(element => {
                                                                  $('#installments').append(`
                                                            <option value="${element.quantity}"
                                                                    data-installmentAmount="${element.installmentAmount}"
                                                                    data-totalAmount="${element.totalAmount}">

                                                                  ${element.quantity < 10 ? 0 : ''}${element.quantity}x 
                                                                  de R$ ${element.installmentAmount < 100 ?  '&nbsp&nbsp' + parseFloat(element.installmentAmount).toFixed(2) :parseFloat(element.installmentAmount).toFixed(2) } 
                                                                  &nbsp&nbsp&nbsp&nbsp&nbsp 
                                                                  total: R$ ${parseFloat(element.totalAmount).toFixed(2)}
                                                            </option>`);
                                                            });

                                                      },
                                                      error: function (responseInstallments) {
                                                            console.log(' error: ' + responseInstallments);
                                                            return;
                                                      },
                                                      complete: function (responseInstallments) {
                                                            // Callback para todas chamadas.
                                                      }
                                                });
                                                return;
                                          }
                                    }
                              },
                              error: function (response) {
                                    console.log(response)
                              },
                              complete: function (response) {
                                    //console.log(response)
                              }
                        });
                  }
            });

            $('#installments').on('change', function () {

                  installmentQuantity = $(this).val(); // Quantidade_de_parcelas_escolhida
                  installmentValue = parseFloat($(this).find(':selected').attr('data-installmentAmount')).toFixed(2); //Valor das parcelas obtidas no serviço de opções de parcelamento.
            });

            $('#form-checkout').on('submit', function (event) {
                  event.preventDefault();

                  PagSeguroDirectPayment.createCardToken({
                        cardNumber: $('#cc-number').val(),
                        brand: brandCard,
                        cvv: $('#cc-cvv').val(),
                        expirationMonth: $('#cc-expiration').val().split('/')[0],
                        expirationYear: $('#cc-expiration').val().split('/')[1],
                        success: function (response) {
                              creditCardToken = response.card.token;
                              console.log(' CREDCARD TOKEN' + creditCardToken);
                        },
                        error: function (response) {
                              console.log(response);
                              return;
                        },
                        complete: function (response) {
                              // Callback para todas chamadas.
                        }
                  });

                  _this = $(this);

                  $.ajax({
                        url: _this.attr('action'),
                        type: _this.attr('method'),
                        dataType: _this.attr('data-type'),
                        data: _this.serialize() + `&art-id=${$('#art-id').val()}&user-id=${userId}&senderHash=${senderHash}&creditCardToken=${creditCardToken}&installmentQuantity=${installmentQuantity}&installmentValue=${installmentValue}&number_people=${$('#number_people').val()}`,
                        beforeSend: function () {
                              _this.find('.load').removeClass('d-none').addClass('d-flex');
                        },
                        success: function (dados) {
                              validateFields(dados, _this);
                              console.log(dados);
                        },
                        error: function (dados) {
                              console.log(dados);
                              console.log(dados.responseText);
                              return;
                        }
                  }).always(function () {
                        _this.find('.load').removeClass('d-flex').addClass('d-none');
                  });
            });

      }


});