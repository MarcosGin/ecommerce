$(function(){
   var form = $('#RegisterForm');
   var message = $('#Message');

   form.on('submit', function (e) {
       e.preventDefault();

       $.ajax({
            url : 'http://localhost/ecommerce/public/account/register',
            type : 'POST',
            data : form.serialize(),
            datatype: 'json',
            beforeSend: function (){
                    message.html('<div id="loading"><img src="/ecommerce/public/assets/img/loading.gif" /> Loading...</div>');
            },
            complete: function () {
                   $('#loading').remove();
            }
       }).done(function (data) {
           if(data.result === true){
               message.html('<div id="Success">' +
                   '<p> <i class="fa fa-exclamation-triangle"></i>  '+ data.message + ' </p>' +
                   '</div>');
               message.css({'display': 'block'});
           }else{
               var messages = "";
               for (var key in data.message){
                    messages += '<p> <i class="fa fa-exclamation-triangle"></i> '+ data.message[key] +'<p/>';
               }
               message.html('<div id="Failed">' + messages + '</div>');
               message.css({'display': 'block'});
           }
       }).fail(function (jqXHR, textStatus, errorThrown) {
           console.log(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
       });

   });



});