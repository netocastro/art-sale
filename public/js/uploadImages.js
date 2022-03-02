/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/uploadImages.js ***!
  \**************************************/
$(document).ready(function () {
  $('form').on('submit', function (e) {
    e.preventDefault();

    var _this = $(this);

    var myForm = document.getElementById('form');
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
        validateFields(data, _this);

        if (data.success) {
          $('#preview').attr('src', '');
        }
      },
      error: function error(_error) {
        console.log(_error.responseText);
      }
    }).always(function () {
      _this.find('.load').removeClass('d-flex').addClass('d-none');
    });
  });

  function show_image(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#preview').attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }

  $('#art').on('change', function () {
    alert('carregou a imagem');
    show_image(this);
  });
});
/******/ })()
;