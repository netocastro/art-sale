$(document).ready(function() {

      $('form').on('submit', function(e){
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
                  beforeSend: function() {
                        _this.find('.load').removeClass('d-none').addClass('d-flex');                 
                  },
                  success: (data) =>{
                        console.log(data);
                        validateFields(data, _this);
                        if(data.success){
                              $('#preview').attr('src', '');
                        }
                  },
                  error: (error) =>{
                        console.log(error.responseText);
                  }
            }).always( function() {
                  _this.find('.load').removeClass('d-flex').addClass('d-none');
            });
      });

      $('#art').on('change', function(){
            show_image(this);
      });

      
});