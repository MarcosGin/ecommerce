$(document).ready(function() {
    $(".Benviar").click(function() {
        var nombre = $(".nombre").val();
        var lastName = $(".lastName").val();
        var password = $(".password").val();
        var conpassword = $(".conpassword").val();
        var email = $(".correo").val();
        var documento = $(".documento").val();
        var day = $(".day").val();
        var month = $(".month").val();
        var year = $(".year").val();
        var phone = $(".phoneReal").val();
        var termine = $("#termine");
        var genero = $(".newGender");
        var errormsg = "";
        var error = false;
        var ValidEmail = / [a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
        var ValidNombre = /[^a-z\d\-=\?!@:\.]/;
        if (nombre == "") {
            errormsg = "Debes ingresar un nombre.";
            error = true;
        } else if (!ValidNombre.test(nombre)) {
            errormsg = "Debes ingresar un nombre válido.";
            error = true;
        } else if (lastName == "") {
            errormsg = "Debes ingresar un apellido.";
            error = true;
        } else if (!ValidNombre.test(lastName)) {
            errormsg = "Debes ingresar un apellido válido.";
            error = true;
        } else if (password == "") {
            errormsg = "Debes ingresar una contraseña.";
            error = true;
        } else if (password !== conpassword) {
            errormsg = "Las contraseñas no coinciden";
            error = true;
        } else if (email == "" || !ValidEmail.test(email)) {
            errormsg = "Debes ingresar un correo electrónico válido.";
            error = true;
        } else if (isNaN(day) || isNaN(month) || isNaN(year)) {
            errormsg = "Debes ingresar una fecha de nacimiento valida.";
            error = true;
        } else if (phone !== "") {
            if (isNaN(phone) || phone.length < 8 || phone.length > 10) {
                errormsg = "Debes ingresar un teléfono válido.";
                error = true;
            }
        } else if (documento == "" || documento.length != 8 || isNaN(documento)) {
            errormsg = "Debes ingresar un documento válido.";
            error = true;
        } else if (genero.is(':checked') == false) {
            errormsg = "Debes seleccionar un sexo.";
            error = true;
        } else if (termine.is(':checked') == false) {
            errormsg = "Debes aceptar las Condiciones de uso y la Política de privacidad.";
            error = true;
        }
        if (error == true) {
            $(".register .error").fadeIn("slow");
            $('.register .error p').text(errormsg);
            return false;
        } else {
            return true;
        }
    });
});