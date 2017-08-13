$(function () {
   var closeSession = (function () {
       return {
           init: function () {
               $('#closed_session').on('click', function (e){
                   alert('hey!');
                   e.preventDefault();
                   $.ajax({
                       url: 'http://localhost/ecommerce/public/account/logout',
                       type: 'GET',
                       data: {},
                       contentType: 'application/json; charset=utf-8',
                       datatype: 'json',
                       cache: false,
                       beforeSend: function (xhr) {
                           xhr.setRequestHeader("Authorization", Cookies.get('__token'));
                       }
                   }).done(function (data) {
                       window.location.replace('http://localhost/ecommerce/public/');
                   }).fail(function (err) {
                       console.log(err);
                   })

               });
           }
       }
   })();
   closeSession.init();
});