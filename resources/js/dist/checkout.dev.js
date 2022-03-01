"use strict";

$(document).ready(function () {
  var creditCardToken;
  var brandCard;
  var senderHash;
  var installment; //parcelamento

  var installmentQuantity; // Quantidade_de_parcelas_escolhida

  var installmentValue; //Valor das parcelas obtidas no serviço de opções de parcelamento.
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
          success: function success(responseBrand) {
            $('#cc-number').removeClass();
            brandCard = responseBrand.brand.name;
            $('#cc-number').addClass(brandCard);
            console.log('brandCard: ' + brandCard);
            $('.card-logo').remove();
            $('#cc-number').after("<img class=\"card-logo\" width=\"100\" src=\"https://stc.pagseguro.uol.com.br".concat(creditCards[creditCard].images.SMALL.path, "\">"));
          },
          error: function error(responseBrand) {
            console.log("response brand: " + responseBrand);
            return;
          },
          complete: function complete(responseBrand) {//tratamento comum para todas chamadas
          }
        });
      }

      if ($('#cc-number').val().length < 6) {
        $('.card-logo').remove();
      }

      if ($('#cc-number').val().length == 16) {
        PagSeguroDirectPayment.getPaymentMethods({
          //amount: 500.00,
          success: function success(responseMethods) {
            var creditCards = responseMethods.paymentMethods.CREDIT_CARD.options;

            for (creditCard in creditCards) {
              if (creditCard == brandCard.toUpperCase()) {
                console.log(creditCards);
                $('.card-logo').remove();
                $('#cc-number').after("<img class=\"card-logo\" width=\"100\" src=\"https://stc.pagseguro.uol.com.br".concat(creditCards[creditCard].images.SMALL.path, "\">"));
                PagSeguroDirectPayment.getInstallments({
                  amount: parseFloat($('#total').html()).toFixed(2),
                  maxInstallmentNoInterest: 2,
                  brand: brandCard.toLowerCase(),
                  success: function success(responseInstallments) {
                    installment = responseInstallments.installments[brandCard.toLowerCase()];
                    console.log(installment);
                    console.log('------------------------------');
                    $('#installments').append("<option value=\"\">--</option>");
                    installment.forEach(function (element) {
                      $('#installments').append("\n                                                            <option value=\"".concat(element.quantity, "\"\n                                                                    data-installmentAmount=\"").concat(element.installmentAmount, "\"\n                                                                    data-totalAmount=\"").concat(element.totalAmount, "\">\n\n                                                                  ").concat(element.quantity < 10 ? 0 : '').concat(element.quantity, "x \n                                                                  de R$ ").concat(element.installmentAmount < 100 ? '&nbsp&nbsp' + parseFloat(element.installmentAmount).toFixed(2) : parseFloat(element.installmentAmount).toFixed(2), " \n                                                                  &nbsp&nbsp&nbsp&nbsp&nbsp \n                                                                  total: R$ ").concat(parseFloat(element.totalAmount).toFixed(2), "\n                                                            </option>"));
                    });
                  },
                  error: function error(responseInstallments) {
                    console.log(' error: ' + responseInstallments);
                    return;
                  },
                  complete: function complete(responseInstallments) {// Callback para todas chamadas.
                  }
                });
                return;
              }
            }
          },
          error: function error(response) {
            console.log(response);
          },
          complete: function complete(response) {//console.log(response)
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
        success: function success(response) {
          creditCardToken = response.card.token;
          console.log(' CREDCARD TOKEN' + creditCardToken);
        },
        error: function error(response) {
          console.log(response);
          return;
        },
        complete: function complete(response) {// Callback para todas chamadas.
        }
      });
      _this = $(this);
      $.ajax({
        url: _this.attr('action'),
        type: _this.attr('method'),
        dataType: _this.attr('data-type'),
        data: _this.serialize() + "&art-id=".concat($('#art-id').val(), "&user-id=").concat(userId, "&senderHash=").concat(senderHash, "&creditCardToken=").concat(creditCardToken, "&installmentQuantity=").concat(installmentQuantity, "&installmentValue=").concat(installmentValue, "&number_people=").concat($('#number_people').val()),
        beforeSend: function beforeSend() {
          _this.find('.load').removeClass('d-none').addClass('d-flex');
        },
        success: function success(dados) {
          validateFields(dados, _this);
          console.log(dados);
        },
        error: function error(dados) {
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