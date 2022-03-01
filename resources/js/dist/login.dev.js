"use strict";

$(document).ready(function () {
  $('form').on('submit', function (e) {
    var _this2 = this;

    e.preventDefault();
    _this = $(this);
    $.ajax({
      url: $(this).attr('action'),
      type: $(this).attr('method'),
      dataType: $(this).attr('data-type'),
      data: $(this).serialize(),
      beforeSend: function beforeSend() {
        _this.find('.load').removeClass('d-none').addClass('d-flex');
      },
      success: function success(data) {
        if (data.success) {
          window.location.href = userPanel;
          console.log(userPanel);
          return;
        }

        validateFields(data, $(_this2));
      },
      error: function error(_error) {
        console.log(_error.responseText);
      }
    }).always(function () {
      _this.find('.load').removeClass('d-flex').addClass('d-none');
    });
  });
});