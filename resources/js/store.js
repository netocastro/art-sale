$(function() {

      $('.delete').on('click', function(e){
            e.preventDefault();

            let data = $(this).data();

            $.ajax({
                  url: data.action,
                  type: 'post',
                  dataType: 'json',
                  data: data,
                  success: function(result){
                        $('.' + data.id).fadeOut().remove();
                        console.log(result);
                  },
                  error: function(error){
                        console.log(error);
                  }
            });
      });
});