$(document).ready(function () {

      let ppp;
      let payment_id;

      $('#continueButton').on('click', function () {
            $('#ppplus').html('').css('height', '0px');
            checkoutPayPal();
      });

      function checkoutPayPal() {

            $.ajax({
                  url: urlCheckout,
                  type: "POST",
                  dataType: "JSON",
                  data: "", // mandar os dados para preencher o invoice
                  async: false,
                  beforeSend: function () {
                        $('#load').removeClass('d-none').addClass('d-flex');
                        $('#continueButton').css('display', 'none');
                  },
                  success: (data) => {
                        console.log(data);
                        console.log(data.id);
                        console.log(data.links[1].href);

                        payment_id = data.id;
                        ppp = PAYPAL.apps.PPP({
                              "approvalUrl": data.links[1].href,
                              "placeholder": "ppplus",
                              "mode": "sandbox",
                              "payerEmail": "paulosilva@gmail.com",
                              "payerFirstName": "Paulo",
                              "payerLastName": "Silva",
                              "payerTaxId": "07272628405",
                              "language": "pt_BR",
                              "country": "BR",
                        });
                        // validateFields(data, _this);
                  },
                  error: (error) => {
                        console.log(error);
                        console.log(error.responseText);
                  }
            }).always(function () {
                  $('#load').removeClass('d-flex').addClass('d-none');
                  $('#continueButton').css('display', 'block');
            });
      }

      function messageListener(event) {
            try {
                  //this is how we extract the message from the incoming events, data format should look like {"action":"inlineCheckout","checkoutSession":"error","result":"missing data in the credit card form"}
                  let data = JSON.parse(event.data);
                  console.log(data);
                  console.log(data.result.payer.payer_info.payer_id);

                  if (data.result.state = "APPROVED") {
                        $.ajax({
                              url: urlPayment,
                              type: "POST",
                              dataType: "JSON",
                              data: `payment_id=${payment_id}&payer_id=${data.result.payer.payer_info.payer_id}`,
                              beforeSend: function () {
                                    //  _this.find('.load').removeClass('d-none').addClass('d-flex');
                              },
                              success: (data2) => {
                                    console.log(data2);
                              },
                              error: (error) => {
                                    console.log(error);
                                    console.log(error.responseText);
                              }
                        }).always(function () {
                              //  _this.find('.load').removeClass('d-flex').addClass('d-none');
                        });
                  }
                  //insert logic here to handle success events or errors, if any

            } catch (exc) {}
      }

      document.getElementById('continueButton').addEventListener('click', function (e) {
            e.preventDefault();
            ppp.doContinue(); 

            if (window.addEventListener) {
                  window.addEventListener("message", messageListener, false);
            } else if (window.attachEvent) {
                  window.attachEvent("onmessage", messageListener);     
            } else {
                  throw new Error("Can't attach message listener");
            }

            return false;
      });

});