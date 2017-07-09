$(function(){
   var form = $('#RegisterForm');
   var message = $('#Message');

   form.on('submit', function (e) {
       e.preventDefault();

       $.ajax({
            url : 'http://localhost/ecommerce/public/account/register',
            type : 'POST',
            data : form.serialize(),
            datatype: 'json'
       }).done(function (data) {
           if(data.result === true){
                //response message success
               console.log("success");
           }else{
               console.log("failed");
           }
       }).fail(function (jqXHR, textStatus, errorThrown) {
           console.log(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
       });

   });



});