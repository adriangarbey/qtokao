<?php

/**
 * The template for displaying the footer
 */

?>
<footer id="site-footer">
    <div class="columns-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3  footer-copy_right">
                    <?php echo wp_get_attachment_image(get_field('logo','options'),'full'); ?><br/>
                    <?php echo get_field('texto_copy_right','options'); ?>
                    <div><a href="<?php echo home_url(esc_html('/'))?>/politicas-de-privacidad">Políticas de Privacidad</a></div>
                </div>
                <div class="col-md-3 footer-contactos">
                    <h3><?php echo get_field('titulo_de_contactos','options'); ?></h3>
                    <?php echo get_field('contactos','options'); ?>
                </div>
                <div class="col-md-3 footer-direccion">
                    <h3><?php echo get_field('titulo_de_direccion','options'); ?></h3>
                    <?php echo get_field('direccion','options'); ?>
                </div>
                <div class="col-md-3 footer-social">
                    <h3><?php echo get_field('titulo_de_redes_sociales','options'); ?></h3>
                    <?php while (have_rows('redes_sociales','option')) : the_row(); ?>
                            <?php $link = get_sub_field('red_social_enlace');
                        $titulo = get_sub_field('titulo');
                        $imagen = wp_get_attachment_image(get_sub_field('red_social_icono'),'full');
                            ?>
                            <a target="blank" rel="noreferrer noopener" href="<?php echo  $link; ?>" title="<?php echo  $titulo ; ?>"><?php echo $imagen; ?></a>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
<script>
    new WOW().init();
</script>
</body>
</html>
