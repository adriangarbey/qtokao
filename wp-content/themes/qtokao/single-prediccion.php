<?php

/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) :
        the_post(); ?>

        <section id="sorteo-portada">
            <?php
                $id_sorteo = get_field('sorteo_prediccion');
                $img = get_field('imagen_desktop_sorteo',$id_sorteo);
            ?>
            <?php echo wp_get_attachment_image($img, 'full'); ?>
            <div class="curve-svg">
                <svg
                        xmlns:dc="http://purl.org/dc/elements/1.1/"
                        xmlns:cc="http://creativecommons.org/ns#"
                        xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                        xmlns:svg="http://www.w3.org/2000/svg"
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                        xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                        inkscape:version="1.0 (4035a4fb49, 2020-05-01)"
                        sodipodi:docname="curve-1.svg"
                        id="svg8"
                        preserveAspectRatio="none"
                        xml:space="preserve"
                        enable-background="new 0 0 240 24"
                        viewBox="0 0 240 24"
                        height="24px"
                        width="240px"
                        y="0px"
                        x="0px"
                        class="uncode-row-divider uncode-row-divider-swoosh-opacity"
                        version="1.1"><metadata
                            id="metadata14">
                        <rdf:RDF>
                            <cc:Work
                                    rdf:about="">
                                <dc:format>image/svg+xml</dc:format>
                                <dc:type
                                        rdf:resource="http://purl.org/dc/dcmitype/StillImage"/>
                                <dc:title></dc:title>
                            </cc:Work>
                        </rdf:RDF>
                    </metadata>
                    <defs
                            id="defs12"/>
                    <sodipodi:namedview
                            inkscape:current-layer="svg8"
                            inkscape:window-maximized="1"
                            inkscape:window-y="-8"
                            inkscape:window-x="-8"
                            inkscape:cy="12"
                            inkscape:cx="120"
                            inkscape:zoom="4.2458333"
                            showgrid="false"
                            id="namedview10"
                            inkscape:window-height="705"
                            inkscape:window-width="1366"
                            inkscape:pageshadow="2"
                            inkscape:pageopacity="0"
                            guidetolerance="10"
                            gridtolerance="10"
                            objecttolerance="10"
                            borderopacity="1"
                            bordercolor="#666666"
                            pagecolor="#ffffff"/>
                    <path
                            id="path2"
                            d="M240,24V0c-51.797,0-69.883,13.18-94.707,15.59c-24.691,2.4-43.872-1.17-63.765-1.08 c-19.17,0.1-31.196,3.65-51.309,6.58C15.552,23.21,4.321,22.471,0,22.01V24H240z"
                            fill-opacity="0.33"
                            fill="#fff"/>
                    <path
                            id="path4"
                            d="M240,24V2.21c-51.797,0-69.883,11.96-94.707,14.16 c-24.691,2.149-43.872-1.08-63.765-1.021c-19.17,0.069-31.196,3.311-51.309,5.971C15.552,23.23,4.321,22.58,0,22.189V24h239.766H240 z"
                            fill-opacity="0.33"
                            fill="#fff"/>
                    <path
                            id="path6"
                            d="M240,24V3.72c-51.797,0-69.883,11.64-94.707,14.021c-24.691,2.359-43.872-3.25-63.765-3.17 c-19.17,0.109-31.196,3.6-51.309,6.529C15.552,23.209,4.321,22.47,0,22.029V24H240z"
                            fill="#ffffff"/> </svg>
            </div>
        </section>
        <?php

		$nombre = get_the_author_meta('first_name').' '.get_the_author_meta('last_name');
		if(empty(get_the_author_meta('first_name')) && !empty(get_the_author_meta('last_name'))){
			$nombre = get_the_author_meta('nickname');
		}
		if(empty(get_the_author_meta('first_name')) && empty(get_the_author_meta('last_name'))){
			$nombre = get_the_author_meta('user_login');
		}

        ?>
        <h4 class="title-nombre-usuario-predictor text-center"><?php echo $nombre; ?> predijo</h4>
		<?php $array = json_decode(get_field('salones_prediccion')); $id_sorteo = get_field('sorteo_prediccion'); ?>
	    <section class="user-ya-predijo text-center">
            <div class="container">
                <div class="row opciones-seleccionadas-anteriormente">
					<?php while (have_rows('categorias_de_prediccion',$id_sorteo)) : the_row();
						$categoria = '';
						foreach ($array as $key => $ar):
							if($key==get_sub_field('identificador')):
								$categoria = get_sub_field('nombre');
								$salon = $ar;?>
                                <div class="col-md-4">
                                    <h3><?php echo $categoria; ?></h3>
                                    <div class="d-flex flex-wrap categoria-prediccion-item-wrapper">

                                        <div class="categoria-prediccion-item d-flex align-items-center">
                                            <div id="<?php echo $key; ?>-<?php echo $salon; ?>"
                                                 class="categoria-prediccion-item-imagen">
												<?php if (!empty(get_the_post_thumbnail($salon))): ?>
                                                    <a href="<?php echo get_the_post_thumbnail_url($salon, 'salon-thumbnail') ?>"><?php echo get_the_post_thumbnail($salon, 'salon-thumbnail') ?></a>
												<?php endif; ?>
												<?php if (!empty(get_field('imagen_de_portada', $salon))): ?>
                                                    <a href="<?php echo wp_get_attachment_url(get_field('imagen_de_portada', $salon), 'full'); ?>"><?php echo wp_get_attachment_image(get_field('imagen_de_portada', $salon), 'salon-thumbnail'); ?></a>
												<?php endif; ?>
												<?php while (have_rows('otras_imagenes', $salon)) : the_row(); ?>
                                                    <a href="<?php echo wp_get_attachment_url(get_sub_field('imagen'), 'full'); ?>"><?php echo wp_get_attachment_image(get_sub_field('imagen'), 'salon-thumbnail'); ?></a>
												<?php endwhile; ?>
                                            </div>
                                            <div class="categoria-prediccion-item-title">
												<?php echo get_the_title($salon); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							<?php  endif;
						endforeach;
					endwhile; ?>
                </div>
            </div>
        </section>


    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
