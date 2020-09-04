<?php
if(get_field('cierre_de_votacion')<date('YmdHis')){
    update_post_meta(get_the_ID(),'estado_sorteo','visible_sin_votacion');
}
if (is_user_logged_in()) {
    $status_sorteo = get_field('estado_sorteo');
    if ($status_sorteo == 'oculto' && !current_user_can('administrator')) {
        wp_redirect(home_url(esc_html('/')));
    } else {

    }
} else {
    $link = get_permalink(get_the_ID());
    wp_redirect(wp_login_url($link));
    exit;
}

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
            <?php echo wp_get_attachment_image(get_field('imagen_desktop_sorteo'), 'full'); ?>
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

        <section id="bienvenida">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bienvenida-wrapper  wow zoomIn">
                            <?php echo get_field('nota_inicial_sorteo'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

		<?php if (get_field('estado_sorteo') == 'visible_con_votacion'): ?>
		<?php if (is_user_logged_in()): ?>
			<?php $query = new wp_query(array(

				'posts_per_page' => '1',
				'post_type' => ''
			));

			$query = new WP_Query(array(
				'post_type' => 'prediccion',
				'posts_per_page' => 999,
				'post_status' => array('publish', 'pending'),
				'author__in' => array(get_current_user_id()),
				'meta_query' => array(
					'relation' => 'AND',
					array(
						'key' => 'sorteo_prediccion',
						'value' => get_the_ID(),
						'compare' => '='
					),
				)
			));
			$cantidad = $query->post_count;
			$predicciones_existentes = $query->posts;
			if ($cantidad == 0):
				?>
                <section class="realizar-prediccion">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="comience_la_prediccion">
									<?php echo get_field('comience_la_prediccion'); ?>
                                    <div class="comience_la_prediccion_link">
                                        <a href="#">OK, comenzar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="make-prediccion" id="make-prediccion" method="post">
                        <input type="hidden" name="sorteo_id"
                               value="<?php echo get_the_ID(); ?>">
                        <div class="categorias_prediccion">
							<?php while (have_rows('categorias_de_prediccion')) : the_row(); ?>
                                <input type="hidden" name="categorias[]"
                                       value="<?php echo get_sub_field('identificador'); ?>">
                                <div class="categoria_prediccion">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                <div class="title_categoria_prediccion d-flex align-items-center">
                                                    <div class="title_categoria_prediccion_icon">
                                                        <svg version="1.1" id="Capa_1" width="12px" height="12px"
                                                             x="0px" y="0px" viewBox="0 0 490.661 490.661"
                                                             style="enable-background:new 0 0 490.661 490.661;"
                                                             xml:space="preserve"><g>
                                                                <g>
                                                                    <path d="M453.352,236.091L48.019,1.424c-3.285-1.899-7.36-1.899-10.688,0c-3.285,1.899-5.333,5.419-5.333,9.237v469.333			c0,3.819,2.048,7.339,5.333,9.237c1.643,0.939,3.499,1.429,5.333,1.429c1.856,0,3.691-0.469,5.355-1.429l405.333-234.667			c3.285-1.92,5.312-5.44,5.312-9.237S456.637,237.989,453.352,236.091z"/>
                                                                </g>
                                                            </g></svg>
                                                    </div>
                                                    <div class="title_categoria_prediccion_text">Seleccione <?php echo get_sub_field('nombre'); ?></div>
                                                    <div class="title_categoria_prediccion_selected">
                                                        <div class="categoria-prediccion-item d-flex align-items-center"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="categoria_prediccion_content" style="display: none">
                                        <div class="container">
                                            <div class="row justify-content-center">
												<?php $salones = get_field('salones_para_predecir'); ?>
												<?php foreach ($salones as $salon): ?>
                                                    <div class="col-md-4 d-flex categoria-prediccion-item-wrapper">
                                                        <div class="categoria-prediccion-item d-flex align-items-center">
                                                            <input type="radio"
                                                                   name="<?php echo get_sub_field('identificador'); ?>[]"
                                                                   value="<?php echo $salon; ?>">
                                                            <div id="<?php echo get_sub_field('identificador'); ?>-<?php echo $salon; ?>"
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
												<?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							<?php endwhile; ?>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="run_prediccion">
                                        <div class="mensaje-espera-prediccion">Selecciona un elemento en cada categoría para continuar</div>
                                        <button>Enviar mi predicción</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
                <section id="prediccion-satisfactoria" class="formulario">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mensaje_satisfactorio"><?php echo get_field('mensaje_satisfactorio');?></div>
                                <div class="nota_final_sorteo"><?php echo get_field('nota_final_sorteo');?></div>
                            </div>
                        </div>
                    </div>
                </section>

			<?php else: ?>
				<?php foreach ($predicciones_existentes as $prediccion_exists):
					$id_prediccion = $prediccion_exists->ID;
					$array = json_decode(get_field('salones_prediccion', $prediccion_exists->ID));
					?>
				<?php endforeach; ?>
                <section class="user-ya-predijo text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Ya realice mi predicción, espero por los resultados</h2>
                                <div class="facebook-share-link text-center"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($id_prediccion); ?>">Compartir resultados en facebook</a></div>
                            </div>
                        </div>
                        <div class="row opciones-seleccionadas-anteriormente">


							<?php while (have_rows('categorias_de_prediccion')) : the_row();
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
                <section id="prediccion-satisfactoria">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mensaje_satisfactorio"><?php echo get_field('mensaje_satisfactorio');?></div>
                                <div class="nota_final_sorteo"><?php echo get_field('nota_final_sorteo');?></div>
                            </div>
                        </div>
                    </div>
                </section>
			<?php endif; ?>

		<?php else: ?>
            <section class="login-user text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Registrate/Accede en <strong>Qt<span>ok</span>ao</strong> para poder participar en la
                                predicción</h2>
							<?php do_action('facebook_login_button'); ?>
                            No uso facebook, lo hare con mi correo desde el <a href="<?php echo wp_login_url(); ?>">formulario</a>
                        </div>
                    </div>
                </div>
            </section>
		<?php endif; ?>
	<?php endif; ?>

        <?php if (get_field('estado_sorteo') == 'visible_con_votacion' || get_field('estado_sorteo') == 'visible_sin_votacion'): ?>
        <section id="premios">
            <div class="premios-bg"></div>
            <div class="premios-wrapper">
                <?php if (!empty(get_field('texto_premios'))): ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-wrapper wow fadeInDown">
                                    <?php echo get_field('texto_premios'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (have_rows('premios')): ?>
                    <div class="container">
                        <div class="row justify-content-center">
                            <?php while (have_rows('premios')) : the_row(); ?>
                                <?php $link = get_sub_field('red_social_enlace');
                                $titulo = get_sub_field('categoria__lugar');
                                $content = get_sub_field('descripcion_del_premio');
                                $data = get_row_index() * .2;
                                ?>
                                <div class="col-md-4 wow fadeInUp" data-wow-delay="<?php echo $data; ?>s">
                                    <div class="premio-item-inner">
                                        <div class="premio-item-title d-flex align-items-end">
                                            <div class="premio-icon"></div>
                                            <?php echo $titulo; ?>
                                        </div>
                                        <div class="premio-item-content">
                                            <?php echo $content; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="curve-svg-top">
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
            <div class="curve-svg-bottom">
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

		<?php if (get_field('estado_sorteo') == 'visible_resultados_finales'): ?>
        <section id="premios">
            <div class="premios-bg"></div>
            <div class="premios-wrapper premios-wrapper-first">
				<?php if (!empty(get_field('texto_premios_salon_resultados'))): ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-wrapper  wow fadeInDown">
									<?php echo get_field('texto_premios_salon_resultados'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php endif; ?>
				<?php if (have_rows('salones_ganadores')): ?>
                    <div class="container">
                        <div class="row justify-content-center">
							<?php while (have_rows('salones_ganadores')) : the_row(); ?>
								<?php
								$titulo = get_sub_field('categoria');
								$salon = get_sub_field('salon_ganador');
								$data = get_row_index() * .2;
								?>
                                <div class="col-md-4 wow fadeInUp" data-wow-delay="<?php echo $data; ?>s">
                                    <div class="premio-item-inner">
                                        <div class="premio-item-title d-flex align-items-end">
                                            <div class="premio-icon"></div>
											<?php echo $titulo; ?>
                                        </div>
                                        <div class="premio-item-content">
                                            <div class="d-flex align-items-center">
                                                <div class="premio-item-content-img">
                                                    <div id="<?php echo get_sub_field('identificador'); ?>-<?php echo $salon; ?>"
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

                                                </div>
                                                <div class="categoria-prediccion-item-title">
		                                            <?php echo get_the_title($salon); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							<?php endwhile; ?>
                        </div>
                    </div>
				<?php endif; ?>
            </div>



            <div class="premios-wrapper premios-wrapper-second">
				<?php if (!empty(get_field('texto_premios_resultados'))): ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-wrapper  wow fadeInDown">
									<?php echo get_field('texto_premios_resultados'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php endif; ?>
				<?php if (have_rows('usuarios_ganadores')): ?>
                    <div class="container">
                        <div class="row justify-content-center">
							<?php while (have_rows('usuarios_ganadores')) : the_row(); ?>
								<?php
								$titulo = get_sub_field('lugar');
								$content = get_sub_field('usuario_ganador');
								$avatar = $content['user_avatar'];
								$nombre = $content['user_firstname'].' '.$content['user_lastname'];
								if(empty($content['user_firstname']) && !empty($content['nickname'])){
									$nombre = $content['nickname'];
                                }
								if(empty($content['user_firstname']) && empty($content['nickname'])){
									$nombre = get_userdata($content['ID'])->user_login;
								}
								$data = get_row_index() * .2;
								?>
                                <div class="col-md-4 wow fadeInUp" data-wow-delay="<?php echo $data; ?>s">
                                    <div class="premio-item-inner">
                                        <div class="premio-item-title d-flex align-items-end">
                                            <div class="premio-icon"></div>
											<?php echo $titulo; ?>
                                        </div>
                                        <div class="premio-item-content">
                                            <div class="d-flex align-items-center">
                                                <div class="premio-item-content-img"><?php echo $avatar; ?></div>
                                                <div class="premio-item-content-nombre"><?php echo $nombre; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							<?php endwhile; ?>
                        </div>
                    </div>
				<?php endif; ?>
            </div>
            <div class="curve-svg-top">
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
            <div class="curve-svg-bottom">
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



    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
