/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/store.js ***!
  \*******************************/
$(document).ready(function () {
  $('.delete').on('click', function (e) {
    e.preventDefault();
    var data = $(this).data();
    $.ajax({
      url: data.action,
      type: 'post',
      dataType: 'json',
      data: data,
      success: function success(result) {
        $('.' + data.id).fadeOut().remove();
        console.log(result);
      },
      error: function error(_error) {
        console.log(_error);
      }
    });
  });
});
/******/ })()
;