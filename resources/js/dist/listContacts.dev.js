"use strict";

$(document).ready(function () {
  $('.read').on('click', function (e) {
    var _this = $(this).closest('tr');

    $('#read-message').html($(this).closest('tr').find('.name').html() + ', ' + $(this).closest('tr').find('.email').html());
    $('.message').html($(this).closest('tr').find('.text_email').html());
    $.ajax({
      url: $(this).data('url'),
      type: 'POST',
      dataType: 'JSON',
      data: "id=" + $(this).closest('tr').attr('id'),
      success: function success(data) {
        $('#' + data).css("font-weight", "");
      },
      error: function error(_error) {
        console.log(_error);
      }
    });
  });
  $('.delete').on('click', function (e) {
    $('.confirm-delete').data('id', $(this).closest('tr').attr('id'));
  });
  $('.confirm-delete').on('click', function (e) {
    $.ajax({
      url: $(this).data('url'),
      type: 'POST',
      dataType: 'JSON',
      data: 'id=' + $('.confirm-delete').data('id'),
      success: function success(data) {
        if (data.deletedContact) {
          $("#".concat($('.confirm-delete').data('id'))).fadeOut().remove();
        }
      },
      error: function error(_error2) {
        console.log(_error2);
      }
    });
  });
});