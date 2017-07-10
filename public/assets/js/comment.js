/**
 * Created by Marcos on 10/07/2017.
 */

$(function () {

    var form = $('#CommentForm');
    var message = $('#Message');

    form.on('submit', function (e) {
       e.preventDefault();

       $.ajax({
            url: 'http://localhost/ecommerce/public/products/comment',
            type: 'POST',
            data: form.serialize(),
            datatype: 'json',
            beforeSend: function (xhr) {
                xhr.setRequestHeader ("Authorization", Cookies.get('__token'));
            }
       }).done(function (data) {
           if(data.result === true){
               Cookies.set('__token', data.jwt);
               message.html('<div id="Success">' +
                   '<p> <i class="fa fa-exclamation-triangle"></i>  '+ data.message + ' </p>' +
                   '</div>');
               message.css({'display': 'block'});
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