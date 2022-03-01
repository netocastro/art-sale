$(document).ready(function() {

      $('#form-teste').on('submit', function(e){
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
                  beforeSend: function() {
                        _this.find('.load').removeClass('d-none').addClass('d-flex');    
                  },
                  success: (data) =>{
                        console.log(data);
                        validateFields(data, _this);
                  },
                  error: (error) =>{
                        console.log(error.responseText);
                  }
            }).always( function() {
                  _this.find('.load').removeClass('d-flex').addClass('d-none');
            });
      });
});
