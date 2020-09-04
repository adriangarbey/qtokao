<?php
if (is_user_logged_in()) {
	if (current_user_can('administrator') && isset($wp_query->query_vars['resultados_hash'])) {
        $postID = $wp_query->query_vars['resultados_hash'];
	} else {
		wp_redirect(home_url());
		exit;
	}
} else {
	wp_redirect(home_url());
	exit;
}

/*
Template Name: Resultado de Sorteo
*/

get_header(); ?>


    <section id="generic_page_title">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1><?php echo get_the_title(); ?> del <?php echo get_the_title($postID); ?></h1>
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

    <section id="generic_page_content">
        <div class="post-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="resultados-container">
                            <div class="text-center export_resultados_link"><a href="<?php echo admin_url(); ?>admin-ajax.php?action=export_predicciones&sorteo_id=<?php echo $postID; ?>"><svg width="15px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"	 viewBox="0 0 477.867 477.867" style="enable-background:new 0 0 477.867 477.867;" xml:space="preserve"><g>	<g>		<path d="M443.733,307.2c-9.426,0-17.067,7.641-17.067,17.067v102.4c0,9.426-7.641,17.067-17.067,17.067H68.267			c-9.426,0-17.067-7.641-17.067-17.067v-102.4c0-9.426-7.641-17.067-17.067-17.067s-17.067,7.641-17.067,17.067v102.4			c0,28.277,22.923,51.2,51.2,51.2H409.6c28.277,0,51.2-22.923,51.2-51.2v-102.4C460.8,314.841,453.159,307.2,443.733,307.2z"/>	</g></g><g>	<g>		<path d="M335.947,295.134c-6.614-6.387-17.099-6.387-23.712,0L256,351.334V17.067C256,7.641,248.359,0,238.933,0			s-17.067,7.641-17.067,17.067v334.268l-56.201-56.201c-6.78-6.548-17.584-6.36-24.132,0.419c-6.388,6.614-6.388,17.099,0,23.713			l85.333,85.333c6.657,6.673,17.463,6.687,24.136,0.031c0.01-0.01,0.02-0.02,0.031-0.031l85.333-85.333			C342.915,312.486,342.727,301.682,335.947,295.134z"/>	</g></g></svg> Exportar</a></div>
                            <?php


                            ?>
                        </div>
                    </div>
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
get_footer();
