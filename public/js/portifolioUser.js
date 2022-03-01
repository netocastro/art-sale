/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/portifolioUser.js ***!
  \****************************************/
$(function () {
  $('form').on('submit', function (e) {
    e.preventDefault();

    var _this = $(this);

    var myForm = document.getElementById('portifolio');
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
      },
      error: function error(_error) {
        console.log(_error.responseText);
      }
    }).always(function () {
      _this.find('.load').removeClass('d-flex').addClass('d-none');
    });
  });
});
/******/ })()
;