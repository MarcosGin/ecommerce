$(function() {
       var form = $('#LoginForm');
       var message = $('#Message');
    form.click(function (e) {
        e.preventDefault();
          $.ajax({
              url: 'http://localhost/ecommerce/public/account/login',
              type: 'POST',
              data: form.serialize(),
              datatype: 'json'
          }).done(function (data) {
             if(data.status === 'nice'){
                 localStorage.setItem("__token", data.jwt);
                 windows.location.replace('http://localhost/ecommerce/public/);
             }else{
                 message.html(' <i class="fa fa-exclamation-triangle"></i> <p>'+ data.message + '</p>');
                 message.css({'display': 'block'});
             }
          }).fail(function (jqXHR, textStatus, errorThrown) {
              console.log(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
          });
    });
});
