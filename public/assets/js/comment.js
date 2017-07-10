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
            datatype: 'json'
       }).done(function (data) {
           console.log(data);
       }).fail(function (jqXHR, textStatus, errorThrown) {
           console.log(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
       });

    });

});