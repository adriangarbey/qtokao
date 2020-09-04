(function ($) {

    $(function () {

    $(document).ready(function($) {
        var homeurl = home_url;
        $('h1 a').attr('href',homeurl);

        $('#user_login').attr('placeholder','Correo electrónico *');
        $('#user_pass').attr('placeholder','Contraseña *');


        $('#registerform #user_login').attr('placeholder','Usuario *');
        $('#registerform #user_email').attr('placeholder','Su correo electrónico *');
    });

});


})(jQuery);

