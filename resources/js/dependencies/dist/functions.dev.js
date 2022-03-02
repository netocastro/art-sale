"use strict";

function validateFields(data, dadosForm) {
  $(dadosForm.find('input, select, textarea')).each(function (index) {
    $("".concat($(this).prop('tagName'), "[name=").concat($(this).attr('name'), "]")).removeClass('is-invalid');
    $("#error-".concat($(this).attr('name'))).fadeOut().remove();
  });
  $('#success').fadeOut().remove();

  if (data.emptyFields) {
    data.emptyFields.forEach(function (element) {
      $("[name=".concat(element, "]")).addClass('is-invalid');
      $("[name=".concat(element, "]")).after("<div id='error-".concat(element, "' class='text-danger'>Campo obrigat\xF3rio</div>"));
      $("#error-".concat(element)).hide().fadeIn();
    });
  }

  if (data.validateFields) {
    var fields = data.validateFields;

    for (var field in fields) {
      $("[name=".concat(field, "]")).addClass('is-invalid');
      $("[name=".concat(field, "]")).after("<div id='error-".concat(field, "' class='text-danger'>").concat(fields[field], "</div>"));
    }
  }

  if (data.success) {
    $('button[type=submit]').after("<h6 id=\"success\" class=\"bg-success text-light p-2 mt-3 rounded text-center\">".concat(data.success, "</h6>")).hide().fadeIn();
    $('.form-control').val('');
  }
}