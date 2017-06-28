$(document).ready(function (){

    $(".login").submit(function(e){
        e.preventDefault();
        $.post('http://localhost/ecommerce/public/account/login', $(".login").serialize(), function(data){
            var data = jQuery.parseJSON(data);
            document.cookie="tokanVal="+ data['jwt'];
            window.location.reload(true);

        });

    });
    function readCookie(name) {

        var nameEQ = name + "=";
        var ca = document.cookie.split(';');

        for(var i=0;i < ca.length;i++) {

            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) {
                return decodeURIComponent( c.substring(nameEQ.length,c.length) );
            }

        }

        return null;

    }

    var miCookie = readCookie("tokanVal");

        // Muestra "Uruguay"
    alert( miCookie );

});