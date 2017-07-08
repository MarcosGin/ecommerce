$(function() {
       var form = $('#LoginForm');
       var message = $('#Message');
    form.on('submit', function (e) {
        e.preventDefault();
          $.ajax({
              url: 'http://localhost/ecommerce/public/account/login',
              type: 'POST',
              data: form.serialize(),
              datatype: 'json'
          }).done(function (data) {
             if(data.result === true){
                 localStorage.setItem("__token", data.jwt);
                 Cookies.set('__token', data.jwt);
                 message.html('<div id="Success">' +
                     '<p> <i class="fa fa-exclamation-triangle"></i>  '+ data.message + ' </p>' +
                     '</div>');
                 message.css({'display': 'block'});
                 window.setInterval(function () {
                     window.location.replace('http://localhost/ecommerce/public/');
                 }, 3000)
             }else{
                 message.html('<div id="Failed">' +
                     '<p> <i class="fa fa-exclamation-triangle"></i> '+ data.message + '</p>' +
                     '</div>');
                 message.css({'display': 'block'});
             }
          }).fail(function (jqXHR, textStatus, errorThrown) {
              console.log(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
          });
    });
});
