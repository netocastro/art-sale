$(document).ready(function() {

     $('.read').on('click', function(e){
            let _this = $(this).closest('tr');
            $('#read-message').html($(this).closest('tr').find('.name').html() +', ' + $(this).closest('tr').find('.email').html());
            $('.message').html($(this).closest('tr').find('.text_email').html());


            $.ajax({
                  url: $(this).data('url'),
                  type: 'POST',
                  dataType: 'JSON',
                  data: "id=" + $(this).closest('tr').attr('id'),
                  success: function(data){ 
                        $('#' + data).css("font-weight","");
                  },
                  error : function(error){
                        console.log(error);
                  }
            });
     });

     $('.delete').on('click', function(e){
            $('.confirm-delete').data('id', $(this).closest('tr').attr('id'));
     });

     $('.confirm-delete').on('click', function(e){

            $.ajax({
                  url: $(this).data('url'),
                  type: 'POST',
                  dataType: 'JSON',
                  data: 'id=' + $('.confirm-delete').data('id'),
                  success: function(data){
                        if(data.deletedContact){
                              $(`#${$('.confirm-delete').data('id')}`).fadeOut().remove();
                        }
                  },
                  error : function(error){
                        console.log(error);
                  }
            });
      });
});