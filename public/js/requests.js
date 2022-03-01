/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/requests.js ***!
  \**********************************/
$(document).ready(function () {
  var sessionId;
  $('#form-description').on('submit', function (e) {
    e.preventDefault();

    var _this = $(this);

    var myForm = this;
    var formData = new FormData(myForm);
    $.ajax({
      url: _this.attr('action'),
      type: _this.attr('method'),
      dataType: _this.attr('data-type'),
      data: formData,
      contentType: false,
      processData: false,
      beforeSend: function beforeSend() {
        _this.find('.load').removeClass('d-none').addClass('d-flex');
      },
      success: function success(data) {
        console.log(data);

        if (data.whithoutLogin) {
          if (!$('#alert-message').length) {
            $('#second-navbar').after("\n                                          <div class=\"alert alert-danger alert-dismissible fade show text-center\" role=\"alert\" id=\"alert\">\n                                                <strong id=\"alert-message\">".concat(data.whithoutLogin, "</strong><a class=\"alert-link\" href=\"").concat(login, "\"> Logar</a>\n                                                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>\n                                          </div>\n                                    ")).fadeIn();
          }

          window.location.href = '#navbar';
        }

        validateFields(data, _this);

        if (data == "validate fields success") {
          $('#continueButton').css('display', 'none');
          var myModal = new bootstrap.Modal(document.getElementById('checkout'), {
            keyboard: false
          });
          myModal.show();
          $('.checkout-art-name').html($('input[name=name]').val());
          $('.checkout-art-person').html('R$ ' + parseFloat(parseFloat($("input[name=price_per_person]").val()) * parseFloat($("select[name=number_people]").val())).toFixed(2));

          if (parseFloat($('input[name=price]').val()) > $('input[name=total]').val()) {
            $('.checkout-art-discount').html('R$ ' + '- ' + parseFloat($('input[name=price]').val() - $('input[name=total]').val()).toFixed(2));
            $('.checkout-art-price').html('R$ ' + $('input[name=price]').val());
          } else {
            $('.checkout-art-price').html('R$ ' + $('input[name=price]').val());
          }

          $('.checkout-total').html('R$ ' + parseFloat(parseFloat($('input[name=total]').val()) + parseFloat($("input[name=price_per_person]").val()) * parseFloat($("select[name=number_people]").val())).toFixed(2));
        } //checkoutPagSeguro(data)

      },
      error: function error(_error) {
        console.log(_error.responseText);
      }
    }).always(function () {
      _this.find('.load').removeClass('d-flex').addClass('d-none');
    });
  });
  /*$('#art').on('change', function(){
        show_image(this);
  });*/

  function checkoutPagSeguro(data) {
    if (data.pagSeguro) {
      sessionId = data.pagSeguro[0];
    }

    if (data.checkout) {
      $('#installments').html('');
      $('#cc-number').val('');
      var myModal = new bootstrap.Modal(document.getElementById('checkout'), {
        keyboard: false
      });
      myModal.show();
      $('.checkout-art-name').html($('input[name=name]').val());
      $('.checkout-art-person').html('R$ ' + parseFloat(parseFloat($("input[name=price_per_person]").val()) * parseFloat($("select[name=number_people]").val())).toFixed(2));

      if (parseFloat($('input[name=price]').val()) > $('input[name=total]').val()) {
        $('.checkout-art-discount').html('R$ ' + '- ' + parseFloat($('input[name=price]').val() - $('input[name=total]').val()).toFixed(2));
        $('.checkout-art-price').html('R$ ' + $('input[name=price]').val());
      } else {
        $('.checkout-art-price').html('R$ ' + $('input[name=price]').val());
      }

      $('.checkout-total').html('R$ ' + parseFloat(parseFloat($('input[name=total]').val()) + parseFloat($("input[name=price_per_person]").val()) * parseFloat($("select[name=number_people]").val())).toFixed(2));
    }

    if (data.request_id) {
      $('#request_id').val(data.request_id);
    }
  }

  $('#number_people').on('change', function (e) {
    $('#total').html(parseFloat(parseFloat($('input[name=total]').val()) + parseFloat($("input[name=price_per_person]").val()) * parseFloat($("select[name=number_people]").val())).toFixed(2));
  });
  $('textarea[name=note]').on('keyup', function (e) {
    $('.text-end').html($('textarea[name=note]').val().length + '/160');
  });
  $('#modal-checkout').on('click', function (e) {
    $('.checkout-art-price').html('R$ ' + $('.text-decoration-line-through').html());
    $('.checkout-art-name').html($('input[name=title]').val());
    $('.checkout-art-person').html('R$ ' + parseFloat(parseFloat($("input[name=price_per_person]").val()) * parseFloat($("select[name=number_people]").val())).toFixed(2));
    $('.checkout-art-discount').html('R$ ' + '- ' + parseFloat($('input[name=price]').val() - $('input[name=total]').val()).toFixed(2));
    $('.checkout-total').html('R$ ' + parseFloat(parseFloat($('input[name=total]').val()) + parseFloat($("input[name=price_per_person]").val()) * parseFloat($("select[name=number_people]").val())).toFixed(2));
  });
});
/******/ })()
;