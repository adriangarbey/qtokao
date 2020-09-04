<?php

/*
Template Name: Inicio
*/

get_header();

/*
 * Section Slide.
 */

if (have_rows('elementos_de_la_portada')): ?>
    <section id="slide-images">
        <div class="slide-portada owl-carousel owl-theme">
    <?php while (have_rows('elementos_de_la_portada')) : the_row(); ?>
        <?php $imagen = wp_get_attachment_image(get_sub_field('imagen_desktop'),'full');
	    $imagen_mobile = wp_get_attachment_image(get_sub_field('imagen_mobile'),'full');
	    ?>
        <div class="item">
            <div class="home-slide-item">
                <div class="slide-item-image">
                    <div class="imagen-dektop">
                        <?php if(!empty(get_sub_field('enlace'))): ?><a href="<?php echo get_sub_field('enlace'); ?>"><?php endif;?>
                        <?php echo $imagen; ?>
                        <?php if(!empty(get_sub_field('enlace'))): ?></a><?php endif;?>
                    </div>
                    <div class="imagen-mobile">
		                <?php if(!empty(get_sub_field('enlace'))): ?><a href="<?php echo get_sub_field('enlace'); ?>"><?php endif;?>
			                <?php echo $imagen_mobile; ?>
			                <?php if(!empty(get_sub_field('enlace'))): ?></a><?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
        </div>
        <div class="dots-container"></div>
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

<?php endif; ?>

    <section id="nosotros">
        <div class="container clearfix">
            <div class="row clearfix">
                <div class="col-md-5 offset-md-7 clearfix">
                    <div class="heading-block wow zoomIn" data-wow-delay=".6s">
                        <h2 class="font-secondary"><?php echo get_field('titulo_nosotros'); ?></h2>
                        <span><?php echo get_field('texto_nosotros'); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="imagen-fondo wow fadeIn" data-wow-delay=".3s" style="background-image: url(<?php echo wp_get_attachment_url(get_field('imagen_nosotros')); ?>)"></div>
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
                        fill="#d13202"/>
                <path
                        id="path4"
                        d="M240,24V2.21c-51.797,0-69.883,11.96-94.707,14.16 c-24.691,2.149-43.872-1.08-63.765-1.021c-19.17,0.069-31.196,3.311-51.309,5.971C15.552,23.23,4.321,22.58,0,22.189V24h239.766H240 z"
                        fill-opacity="0.33"
                        fill="#d13202"/>
                <path
                        id="path6"
                        d="M240,24V3.72c-51.797,0-69.883,11.64-94.707,14.021c-24.691,2.359-43.872-3.25-63.765-3.17 c-19.17,0.109-31.196,3.6-51.309,6.529C15.552,23.209,4.321,22.47,0,22.029V24H240z"
                        fill="#d13202"/> </svg>
        </div>
    </section>

    <section id="qtokao-redes">
        <div class="section-title">QTOKAO en las redes</div>
        <div class="section-content">
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
                        version="1.1">
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
                            fill="#d13202"/>
                    <path
                            id="path4"
                            d="M240,24V2.21c-51.797,0-69.883,11.96-94.707,14.16 c-24.691,2.149-43.872-1.08-63.765-1.021c-19.17,0.069-31.196,3.311-51.309,5.971C15.552,23.23,4.321,22.58,0,22.189V24h239.766H240 z"
                            fill-opacity="0.33"
                            fill="#d13202"/>
                    <path
                            id="path6"
                            d="M240,24V3.72c-51.797,0-69.883,11.64-94.707,14.021c-24.691,2.359-43.872-3.25-63.765-3.17 c-19.17,0.109-31.196,3.6-51.309,6.529C15.552,23.209,4.321,22.47,0,22.029V24H240z"
                            fill="#d13202"/> </svg>
            </div>
            <div class="container">
                <div class=" row ">
                    <?php while (have_rows('banner_redes')) : the_row(); ?>
                        <div class=" col-lg-4 col-md-6 col-sm-6 banner-social-item">
                            <div class="banner-social-item-inner wow fadeInUp" data-wow-delay=".2s">
                                    <a target="_blank" href="<?php echo get_sub_field('link'); ?>" title="<?php echo get_sub_field('title_link'); ?>"><img src="<?php echo get_sub_field('imagen'); ?>"/></a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="noticias">
        <div class="container">
            <div class=" row ">
                <div class=" col-md-12 ">
        <div class="section-title text-center"><h2>Artículos más recientes</h2></div>
        </div>
        </div>
        </div>
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
                        version="1.1">
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
                            fill="#d13202"/>
                    <path
                            id="path4"
                            d="M240,24V2.21c-51.797,0-69.883,11.96-94.707,14.16 c-24.691,2.149-43.872-1.08-63.765-1.021c-19.17,0.069-31.196,3.311-51.309,5.971C15.552,23.23,4.321,22.58,0,22.189V24h239.766H240 z"
                            fill-opacity="0.33"
                            fill="#d13202"/>
                    <path
                            id="path6"
                            d="M240,24V3.72c-51.797,0-69.883,11.64-94.707,14.021c-24.691,2.359-43.872-3.25-63.765-3.17 c-19.17,0.109-31.196,3.6-51.309,6.529C15.552,23.209,4.321,22.47,0,22.029V24H240z"
                            fill="#d13202"/> </svg>
            </div>
            <div class="container">
                <div class=" row ">



                               <?php $query = new WP_Query( array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'post_status'    => 'publish',
            ) );
            $posts = $query->posts;
            ?>
				<?php foreach ( $posts as $element ) : $id = $element->ID; ?>
                    <div class="news-item col-md-4">
                        <div class="news-item-inner">
                            <div class="news-item-image">
                                <a href="<?php echo get_permalink( $id ); ?>"
                                   title="<?php echo get_the_title( $id ); ?>"><?php echo get_the_post_thumbnail( $id, 'noticia-portada', "", array( "class" => "img-responsive" ) ); ?></a>
                            </div>
                            <div class="news-item-title"><a href="<?php echo get_permalink( $id ); ?>"
                                                                        title="<?php echo get_the_title( $id ); ?>"><?php echo get_the_title( $id ); ?></a>
                            </div>
                            <div class="news-item-resumen"><?php echo get_the_excerpt($id ); ?></div>
                        </div>
                    </div>
				<?php endforeach; ?>


                </div>
            </div>

    </section>

    <section id="anuncios">
        <div class="container">
            <div class=" row ">
                <?php while (have_rows('promociones')) : the_row(); ?>
                    <div class=" col-lg-4 col-md-6 ">
                        <div class="skill-container wow fadeInUp" data-wow-delay=".4s">
                            <div class="skill-img skill-img-1">
                                <h4><?php echo get_sub_field('titulo_promociones'); ?></h4>
                            </div>
                            <div class=" skill-info ">
                                <?php echo get_sub_field('texto_promociones'); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <section id="llamada-anunciarse">
        <div class="imagen-fondo wow fadeIn" data-wow-delay=".3s" style="background-image: url(<?php echo wp_get_attachment_url(get_field('imagen_anunciate')); ?>)"></div>
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
                    version="1.1">
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
                        fill="#d13202"/>
                <path
                        id="path4"
                        d="M240,24V2.21c-51.797,0-69.883,11.96-94.707,14.16 c-24.691,2.149-43.872-1.08-63.765-1.021c-19.17,0.069-31.196,3.311-51.309,5.971C15.552,23.23,4.321,22.58,0,22.189V24h239.766H240 z"
                        fill-opacity="0.33"
                        fill="#d13202"/>
                <path
                        id="path6"
                        d="M240,24V3.72c-51.797,0-69.883,11.64-94.707,14.021c-24.691,2.359-43.872-3.25-63.765-3.17 c-19.17,0.109-31.196,3.6-51.309,6.529C15.552,23.209,4.321,22.47,0,22.029V24H240z"
                        fill="#d13202"/> </svg>
        </div>
        <div class="container wow fadeInLeft" data-wow-delay=".5s">
            <div class="row">
                <div class="col-lg-5 offset-lg-1">
                    <div class="heading-block" id="ads">
                        <h2 class="font-secondary"><?php echo get_field('titulo_anunciate'); ?></h2>
                        <span><?php echo get_field('texto_anunciate'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="servicios">
        <div class="servicios-content">
            <div class="container">
                <div id="posts " class="row">
                    <div class="col-md-12">
                        <h2 class=" wow fadeInDown"><?php echo get_field('titulo_servicios'); ?></h2>
                    </div>
                </div>
                    <div id="posts " class="row">
                        <?php while (have_rows('servicios_portada')) : the_row(); ?>
                            <div class="col-md-4 d-flex justify-content-center entry nobottomborder nobottompadding wow fadeInUp">
                                <div class="entry-box-shadow ">
                                    <div class="entry-image nobottommargin ">
                                        <?php echo wp_get_attachment_image(get_sub_field('servicios_imagen_servicio'),'full'); ?>
                                    </div>
                                    <div class="entry-meta-wrapper ">

                                        <div class="entry-title clearfix ">
                                            <h3><?php echo get_sub_field('servicios_titulo_servicio'); ?></h3>
                                        </div>
                                        <div class="entry-content clearfix ">
                                            <?php echo get_sub_field('servicios_descripcion_servicio'); ?>
                                            <div class="entry-content-link"><a href="<?php echo get_sub_field('servicios_enlace_servicio'); ?>"><?php echo get_sub_field('titulo_enlace_servicio'); ?></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                </div>
            </div>
        </div>
        <div class="curve-svg">
            <svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" inkscape:version="1.0 (4035a4fb49, 2020-05-01)" sodipodi:docname="curve-1.svg" id="svg8" preserveAspectRatio="none" xml:space="preserve" enable-background="new 0 0 240 24" viewBox="0 0 240 24" height="24px" width="240px" y="0px" x="0px" class="uncode-row-divider uncode-row-divider-swoosh-opacity" version="1.1"><metadata id="metadata14">
                    <rdf:rdf>
                        <cc:work rdf:about="">
                            <dc:format>image/svg+xml</dc:format>
                            <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"></dc:type>
                            <dc:title></dc:title>
                        </cc:work>
                    </rdf:rdf>
                </metadata>
                <defs id="defs12"></defs>
                <sodipodi:namedview inkscape:current-layer="svg8" inkscape:window-maximized="1" inkscape:window-y="-8" inkscape:window-x="-8" inkscape:cy="12" inkscape:cx="120" inkscape:zoom="4.2458333" showgrid="false" id="namedview10" inkscape:window-height="705" inkscape:window-width="1366" inkscape:pageshadow="2" inkscape:pageopacity="0" guidetolerance="10" gridtolerance="10" objecttolerance="10" borderopacity="1" bordercolor="#666666" pagecolor="#ffffff"></sodipodi:namedview>
                <path id="path2" d="M240,24V0c-51.797,0-69.883,13.18-94.707,15.59c-24.691,2.4-43.872-1.17-63.765-1.08 c-19.17,0.1-31.196,3.65-51.309,6.58C15.552,23.21,4.321,22.471,0,22.01V24H240z" fill-opacity="0.33" fill="#fff"></path>
                <path id="path4" d="M240,24V2.21c-51.797,0-69.883,11.96-94.707,14.16 c-24.691,2.149-43.872-1.08-63.765-1.021c-19.17,0.069-31.196,3.311-51.309,5.971C15.552,23.23,4.321,22.58,0,22.189V24h239.766H240 z" fill-opacity="0.33" fill="#fff"></path>
                <path id="path6" d="M240,24V3.72c-51.797,0-69.883,11.64-94.707,14.021c-24.691,2.359-43.872-3.25-63.765-3.17 c-19.17,0.109-31.196,3.6-51.309,6.529C15.552,23.209,4.321,22.47,0,22.029V24H240z" fill="#fff"></path> </svg>
        </div>
    </section>
<?php //do_action('facebook_login_button');?>
<?php
get_footer();
