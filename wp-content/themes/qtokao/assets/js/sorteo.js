(function ($) {

    var ajaxurl = admin_url + 'admin-ajax.php';

    function make_prediccion() {
        $('.popup-upload').hide();
        $('#make-prediccion button').attr('disabled','');
        $("#make-prediccion .button-submit-loader").addClass('active');
        var form = $("#make-prediccion").serialize();
        var data = {
            action: "make_prediccion",
            data: form,
            security: security_perfil
        };
        $.post(ajaxurl, data, function (response) {
            var obj = $.parseJSON(response);
            $('#make-prediccion button').removeAttr('disabled','');
            $("#make-prediccion .button-submit-loader").removeClass('active');
            if(obj.answer=='true'){
                $('#prediccion-satisfactoria.formulario .mensaje_satisfactorio').after(obj.facebook_share);
                $('.realizar-prediccion').slideUp();
                $('#prediccion-satisfactoria.formulario').slideDown();
            }else{
                $('body').append('<div class="popup-upload error"><div>'+obj.message+'</div></div>');
            }
            wow = new WOW( {
                    boxClass:     'wow',
                    animateClass: 'animated',
                    offset:       100
                }
            );

            wow.init();
            setTimeout(function(){ $('.popup-upload').fadeOut(); }, 7000);
        });
    }

    $(function () {


        $('.comience_la_prediccion_link a').on("click", function (e) {
            e.preventDefault();
            $('.comience_la_prediccion').slideUp();
            $('.make-prediccion').slideDown();
        });

        $('.categoria-prediccion-item').on("click", function (e) {
            e.preventDefault();
            $('.categoria-prediccion-item').removeClass('selected');
            $(this).addClass('selected');
            $(this).find("input").prop( "checked", true );

           /* var land = 'true';
            $('.categoria_prediccion_content').each(function () {
                if(land=='false'){
                    return false;
                }
                alert(land);
                land = 'false';
                if($(this).find('.categoria-prediccion-item.selected').length){
                    alert('encontrado');
                    land = 'true';
                }
            });

            if(land=='false'){
                $('.run_prediccion button').attr('disabled', 'disabled');
            }else{
                $('.run_prediccion button').removeAttr('disabled');
            }*/


        });

        $('.title_categoria_prediccion').on("click", function (e) {
            e.preventDefault();
            if($(this).hasClass('open')){
                $(this).removeClass('open');
                $('.categoria_prediccion_content').slideUp();
            }else{
                $('.title_categoria_prediccion').removeClass('open');
                $('.categoria_prediccion_content').slideUp();
                $(this).parent().parent().parent().next().slideDown();
                $(this).removeClass('open');
                $(this).addClass('open');
            }
        });

        $('.categoria-prediccion-item').on("click", function (e) {
            e.preventDefault();
            var html = $(this).html();
            $(this).parent().parent().parent().parent().parent().find('.title_categoria_prediccion_selected .categoria-prediccion-item').html(html);
            $(this).parent().parent().parent().parent().parent().find('.title_categoria_prediccion_selected .categoria-prediccion-item input').remove();

            $(this).parent().parent().parent().parent().parent().find('.title_categoria_prediccion').removeClass('open');
            $('.categoria_prediccion_content').slideUp();
            if($(this).parent().parent().parent().parent().parent().next().next().hasClass('categoria_prediccion')){
                $(this).parent().parent().parent().parent().parent().next().next().find('.title_categoria_prediccion').trigger("click");
            }

        });

        $('.categoria-prediccion-item-imagen').each(function (index, element) {
            var id = $(this).attr('id');
            lightGallery(document.getElementById(id));
        });

        $("#make-prediccion").submit(function (e) {
            e.preventDefault();
            make_prediccion();
        });


    });

})(jQuery);

