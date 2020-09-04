<?php

function qtokao_theme_support() {

	add_theme_support( 'automatic-feed-links' );

	add_theme_support(
		'custom-background',
		array(
			'default-color' => '2596d3',
		)
	);

	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 580;
	}

	add_theme_support( 'post-thumbnails' );


	add_image_size( 'salon-thumbnail', 150, 150, true );
	add_image_size( 'noticia-portada', 403, 231, true );
	$logo_width  = 147;
	$logo_height = 36;

	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
            'header-text' => array( 'site-title', 'site-description' ),
		)
	);
	add_theme_support( 'title-tag' );
    add_theme_support( 'favicon' );
    add_theme_support( 'widgets' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);
	load_theme_textdomain( 'qtokao' );
	add_theme_support( 'align-wide' );
}

add_action( 'after_setup_theme', 'qtokao_theme_support' );


/**
 * Register and Enqueue Styles.
 */

function qtokao_login_stylesheet() {
    wp_enqueue_script('jquery', get_template_directory_uri() . '/vendors/jquery/jquery-3.5.1.min.js');
    wp_enqueue_style( 'custom-login', get_template_directory_uri() .'/assets/css/style-login.css', array(), 1.7, 'all' );
    wp_enqueue_script( 'login-js', get_template_directory_uri() . '/assets/js/login-scripts.js', array('jquery'), 1.1, false );
    wp_localize_script( 'login-js', 'home_url', esc_url(home_url('/')));
}
add_action( 'login_enqueue_scripts', 'qtokao_login_stylesheet' );

/**
 * Register and Enqueue Scripts.
 */
function qtokao_register_scripts() {

	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/vendors/bootstrap/css/bootstrap.min.css', array(), NULL, 'all' );

    if(is_page_template('page-inicio.php')){
	    wp_enqueue_style( 'owl-carousel-default-style', get_stylesheet_directory_uri() . '/vendors/jcarousel/owl.theme.default.min.css' , array(), NULL, 'all' );
	    wp_enqueue_style( 'owl-carousel-style', get_stylesheet_directory_uri() . '/vendors/jcarousel/owl.carousel.min.css', array(), NULL, 'all' );
	    wp_enqueue_style( 'animate-style', get_stylesheet_directory_uri() . '/vendors/animate/animate.css', array(), NULL, 'all' );
	    wp_enqueue_style( 'home-style', get_template_directory_uri(). '/assets/css/home.css', array(), 1.5, 'all' );
	    wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/vendors/jcarousel/owl.carousel.min.js', array('jquery'), NULL, true );
        wp_enqueue_script( 'animate-js', get_template_directory_uri() . '/vendors/animate/wow.min.js', array('jquery'), NULL, true );
	    wp_enqueue_script( 'home-js', get_template_directory_uri() . '/assets/js/home.js', array(), 1.4, true );
    }

	if(is_page_template('page-resultado.php')){
	    wp_enqueue_style( 'animate-style', get_stylesheet_directory_uri() . '/vendors/animate/animate.css', array(), NULL, 'all' );
		wp_enqueue_style( 'resultado-style', get_template_directory_uri(). '/assets/css/resultado.css', array(), 1.2, 'all' );
		wp_enqueue_script( 'resultado-js', get_template_directory_uri() . '/assets/js/resultado.js', array(), 1.2, true );
	}

    if(is_singular('sorteo') || is_singular('prediccion')){
        wp_enqueue_style( 'lightgallery-style', get_template_directory_uri(). '/vendors/lightgallery/dist/css/lightgallery.min.css', array(), NULL, 'all' );
        wp_enqueue_style( 'animate-style', get_stylesheet_directory_uri() . '/vendors/animate/animate.css', array(), NULL, 'all' );
        wp_enqueue_style( 'sorteo-style', get_template_directory_uri(). '/assets/css/sorteo.css', array(), 1.9, 'all' );
        wp_enqueue_script( 'lightgallery-js', get_template_directory_uri() . '/vendors/lightgallery/dist/js/lightgallery.min.js', array(), NULL, true );
        wp_enqueue_script( 'animate-js', get_template_directory_uri() . '/vendors/animate/wow.min.js', array('jquery'), NULL, true );
        wp_enqueue_script( 'sorteo-js', get_template_directory_uri() . '/assets/js/sorteo.js', array(), 1.4, true );
        wp_localize_script('sorteo-js', 'admin_url', admin_url());
        wp_localize_script('sorteo-js', 'security_perfil', wp_create_nonce('update_perfil'));
    }

	if(is_singular('post')){
		wp_enqueue_style( 'animate-style', get_stylesheet_directory_uri() . '/vendors/animate/animate.css', array(), NULL, 'all' );
		wp_enqueue_style( 'noticia-style', get_template_directory_uri(). '/assets/css/noticia.css', array(), 1.10, 'all' );
		wp_enqueue_script( 'animate-js', get_template_directory_uri() . '/vendors/animate/wow.min.js', array('jquery'), NULL, true );
	}

		wp_enqueue_style( 'qtokao-style', get_stylesheet_uri(), array(), 1.2, 'all' );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/vendors/bootstrap/js/bootstrap.min.js', array(), NULL, true  );
}
add_action( 'wp_enqueue_scripts', 'qtokao_register_scripts' );

function load_custom_scripts() {
		wp_deregister_script( 'jquery' );
		wp_register_script('jquery', get_template_directory_uri() . '/vendors/jquery/jquery-3.5.1.min.js', array(), '3.5.1');
		wp_enqueue_script( 'jquery' );
}

if(!is_admin()) {
	add_action('wp_enqueue_scripts', 'load_custom_scripts', 99);
}

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function qtokao_menus() {

	$locations = array(
		'main_menu'  => __( 'Menú principal', 'qtokao' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'qtokao_menus' );

/**
 * Get the information about the logo.
 *
 * @param string $html The HTML output from get_custom_logo (core function).
 *
 * @return string $html
 */
function qtokao_get_custom_logo( $html ) {

    $logo_id = get_theme_mod( 'custom_logo' );

    if ( ! $logo_id ) {
        return $html;
    }

    $logo = wp_get_attachment_image_src( $logo_id, 'full' );

    if ( $logo ) {
        // For clarity.
        $logo_width  = esc_attr( $logo[1] );
        $logo_height = esc_attr( $logo[2] );

        // If the retina logo setting is active, reduce the width/height by half.
        if ( get_theme_mod( 'retina_logo', false ) ) {
            $logo_width  = floor( $logo_width / 2 );
            $logo_height = floor( $logo_height / 2 );

            $search = array(
                '/width=\"\d+\"/iU',
                '/height=\"\d+\"/iU',
            );

            $replace = array(
                "width=\"{$logo_width}\"",
                "height=\"{$logo_height}\"",
            );

            // Add a style attribute with the height, or append the height to the style attribute if the style attribute already exists.
            if ( strpos( $html, ' style=' ) === false ) {
                $search[]  = '/(src=)/';
                $replace[] = "style=\"height: {$logo_height}px;\" src=";
            } else {
                $search[]  = '/(style="[^"]*)/';
                $replace[] = "$1 height: {$logo_height}px;";
            }

            $html = preg_replace( $search, $replace, $html );

        }
    }

    return $html;

}

add_filter( 'get_custom_logo', 'qtokao_get_custom_logo' );

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * Add ACF options pages.
 *
 * @link
 */
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {
        acf_add_options_page( array(
            'page_title' => 'Opciones generales',
            'menu_title' => __('Opciones generales', 'text-domain'),
            'menu_slug'  => "site-options",
            'post_id'    => 'options'
        ) );
}

/**
 * Save ACF in another database
 *
 * @since Theme 1.0
 */
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point($path)
{
    // update path
    $path = get_stylesheet_directory() . '/vendors/acf';
    // return
    return $path;

}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point($paths)
{
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/vendors/acf';
    return $paths;
}

// Redirect user to home on logout and login
add_action('wp_logout', 'logout_after_logout');
function logout_after_logout()
{
	wp_redirect(home_url());
	exit();
}

function login_redirect( $redirect_to, $request, $user ){
	return get_permalink(190);
}
add_filter( 'login_redirect', 'login_redirect', 10, 3 );



add_action( 'wp_enqueue_scripts', 'wpassist_dequeue_scripts' );
function wpassist_dequeue_scripts(){
    if (!is_user_logged_in()) {
		wp_deregister_script('wp-emoji');
	    if (!is_singular('post','subprogama')) {
		    wp_deregister_script( 'wp-embed' );
	    }
    }
}

function disable_emojis() {
	if (!is_user_logged_in()){
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	}
}
add_action( 'init', 'disable_emojis' );

add_action( 'wp_print_styles',     'my_deregister_styles', 100 );
function my_deregister_styles()    {
	if (!is_singular('post','subprogama')) {
		wp_deregister_style( 'wp-block-library' );
	}
}

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

function wpabsolute_block_users_backend() {
    if ( is_admin() && ! current_user_can( 'administrator' ) && ! wp_doing_ajax() ) {
        wp_redirect( home_url() );
        exit;
    }
}
add_action( 'init', 'wpabsolute_block_users_backend' );


add_action( 'wp_ajax_make_prediccion', 'make_prediccion' );
add_action( 'wp_ajax_nopriv_make_prediccion', 'make_prediccion' );
function make_prediccion() {
    check_ajax_referer( 'update_perfil', 'security' );
    if ( isset( $_POST['data'] ) && is_user_logged_in() ) {
        parse_str( $_POST['data'], $form_data );

        $land    = true;
        $message = '';
        foreach ($form_data['categorias'] as $cat){
            if(!array_key_exists($cat,$form_data)){
                $land    = false;
                $message .=  'Debe seleccionar al menos un contenido en cada categoría. ';
                break;
            }
        }

        if($land){
            if (get_field('estado_sorteo',$form_data['sorteo_id']) != 'visible_con_votacion'){
                $land    = false;
            }
        }

        if($land){
            $query = new WP_Query(array(
                'post_type' => 'prediccion',
                'posts_per_page' => 999,
                'post_status' => array('publish', 'pending'),
                'author__in' => array(get_current_user_id()),
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'sorteo_prediccion',
                        'value' => $form_data['sorteo_id'],
                        'compare' => '='
                    ),
                )
            ));
            $cantidad = $query->post_count;
            if ($cantidad != 0):
                $land    = false;
            endif;
        }

        if($land){


            $array = array();

            foreach ($form_data['categorias'] as $cat){
                $array[$cat] = $form_data[$cat]['0'];
            }
            $json = json_encode($array);
            $query = new WP_Query(array(
                'post_type' => 'prediccion',
                'posts_per_page' => 999,
                'post_status' => array('publish', 'pending'),
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'sorteo_prediccion',
                        'value' => $form_data['sorteo_id'],
                        'compare' => '='
                    ),
                    array(
                        'key' => 'salones_prediccion',
                        'value' => $json,
                        'compare' => '='
                    ),
                )
            ));
            $cantidad = $query->post_count;
            if ($cantidad != 0):
                $land    = false;
                $message .=  get_field('mensaje_de_prediccion_existente',$form_data['sorteo_id']).' ';
            endif;
        }



	    if(count(array_unique($array))<count($array))
	    {
		    $land    = false;
		    $message .=  'No es posible seleccionar un mismo salón en más de una categoría, la selección debe ser distinta en cada categoría. ';
	    }
	    else
	    {

	    }

	    if ( $land ) {
            $post_information = [
                'post_title'   => date('Ymdhi'),
                'post_name'    => date('Ymdhi'),
                'post_status'  => 'publish',
                'post_content' => '',
                'post_type'    => 'prediccion',
                'post_author'  => get_current_user_id(),
            ];
            $job_id           = wp_insert_post( $post_information );
            $facebook = '<div class="facebook-share-link text-center"><a href="https://www.facebook.com/sharer/sharer.php?u='.get_permalink($job_id).'">Compartir resultados en facebook</a></div>';
            update_field( 'salones_prediccion',  $json, $job_id );
            update_field( 'sorteo_prediccion',  $form_data['sorteo_id'], $job_id );
            echo json_encode( [ "facebook_share" => $facebook ,"answer" => 'true', 'message' => get_field('mensaje_satisfactorio',$form_data['sorteo_id']) ] );
            wp_die();
        }

        if ( ! $land ) {
            echo json_encode( [ "answer"  => 'false',  'message' => $message ] );
        }
    } else {
        echo json_encode( [ "reply" => 'false', "message" => "No tiene acceso al contenido." ] );
    }
    exit;
}

/*function migrar_usuarios_anteriores() {

	global $wpdb;
	$quotes_users_table_name = "qtk_rifa";
	$results = $wpdb->get_results($wpdb->prepare("SELECT * FROM $quotes_users_table_name"));
	foreach ($results as $result):
	$nombre = $result->nombre;
	$id_facebook = $result->id_fb;
	$email = $result->email;
	if(!empty($email)){
		$mail_arr = explode('@',$email);
		$data = array(
			'user_login'           => $mail_arr[0],
			'user_pass'            => md5(rand()),
			'show_admin_bar_front' => false,
			'display_name'          => $nombre,
            'first_name'   => $nombre,
		);
		$user_id = wp_insert_user( $data );
		if ( ! is_wp_error( $user_id ) ) {
			update_user_meta($user_id,'_fb_user_id',$id_facebook);
			update_user_meta($user_id,'qtkao_user_importer','1');
		}
	}
	endforeach;
	return '';
}*/

/*
 *  CAMBIANDO COLUMNAS DE ADMIN EN SORTEOS
 */
add_filter('manage_sorteo_posts_columns', 'qtkao_sorteo_columns');
function qtkao_sorteo_columns($defaults)
{

	$defaults = [
		'cb' => $defaults['cb'],
		'title' => __('Nombre del sorteo'),
		'status' => __('Estado'),
		'resultado' => __('Resultado'),
	];

	return $defaults;
}

add_action('manage_sorteo_posts_custom_column', 'qtkao_sorteo_table_content', 10, 2);
function qtkao_sorteo_table_content($column_name, $post_id)
{

	if ($column_name == 'title') {
		$consejo = get_the_title( $post_id);
		echo $consejo;
	}

	if ($column_name == 'status') {
		$terms_output = '';
		$terms_output = get_field( 'estado_sorteo', $post_id );
		if($terms_output=='oculto'){
			$terms_output = 'Oculto';
		}elseif($terms_output=='visible_sin_votacion'){
			$terms_output = 'Visible, sin votacion';
		}elseif($terms_output=='visible_con_votacion'){
			$terms_output = 'Visible, con votacion';
		}elseif($terms_output=='visible_resultados_finales'){
			$terms_output = 'Visible con resultados finales';
		}
		echo $terms_output;
	}

	if ($column_name == 'resultado') {
		$status = '<a href="'.home_url(esc_html('/')).'resultados/'.$post_id.'" title="Ver resultados" target="_blank">Ver resultados</a>';
		echo $status;
	}

}

add_filter('manage_edit-sorteo_sortable_columns', 'qtkao_sorteo_table_sorting');
function qtkao_sorteo_table_sorting($columns)
{
	$columns['title'] = 'title';
	$columns['status'] = 'status';
	$columns['resultado'] = 'resultado';
	return $columns;
}

// Agregando query vars de resultados
function add_query_vars($aVars) {
	$aVars[] = "resultados_hash";
	return $aVars;
}
add_filter('query_vars', 'add_query_vars');

function add_rewrite_rules($aRules) {
	$aNewRules = array('resultados/([^/]+)/?$' => 'index.php?pagename=resultados&resultados_hash=$matches[1]');
	$aRules = $aNewRules + $aRules;
	return $aRules;
}
add_filter('rewrite_rules_array', 'add_rewrite_rules');

add_action('wp_ajax_export_predicciones', 'export_predicciones');
add_action('wp_ajax_nopriv_export_predicciones', 'export_predicciones');
function export_predicciones() {
	if ( is_user_logged_in() &&  current_user_can('administrator') ) {
		$sorteo = $_GET['sorteo_id'];
		$xls_content = '';
		$query = new WP_Query(array(
			'post_type' => 'prediccion',
			'posts_per_page' => 999,
			'post_status' => array('publish', 'pending'),
			'meta_query' => array(
				'relation' => 'AND',
				array(
					'key' => 'sorteo_prediccion',
					'value' => $sorteo,
					'compare' => '='
				),
			)
		));
		$authors = $query->posts;
		foreach ($authors as $request):

				$sorteo = get_field('sorteo_prediccion',$request->ID);
				$prediccion = json_decode(get_field('salones_prediccion',$request->ID));
				$post_author_id = get_post_field( 'post_author', $request->ID );
				$user_mail = get_userdata($post_author_id)->user_email;
				$nombre = get_user_meta( $post_author_id, 'last_name', true ).' '.get_user_meta( $post_author_id, 'last_name', true );
				$facebook_id = get_user_meta($post_author_id,'_fb_user_id', true);
				$user_name = get_userdata($post_author_id)->user_login;
				$xls_content .= '<tr>
								 <td>' . utf8_decode($nombre) . '</td>
                                 <td>' . utf8_decode($user_name) . '</td>
                                 <td>' . utf8_decode($user_mail) . '</td>
                                 <td>' . $facebook_id. '</td>';
                                foreach ($prediccion as $pred):   $xls_content .='<td>' . utf8_decode(get_the_title($pred)) . '</td>';          endforeach;
	                                $xls_content .='</tr>';


		endforeach;

		$xls_header = '<table border="1">';
		$xls_header .= '<tr>
									<th><strong>' . utf8_decode('Nombre') . '</strong></th>
                                    <th><strong>' . utf8_decode('User') . '</strong></th>
                                    <th><strong>' . utf8_decode('Email') . '</strong></th>
                                    <th><strong>' . utf8_decode('Facebook ID') . '</strong></th>';

		while ( have_rows( 'categorias_de_prediccion',$sorteo ) ) : the_row();
			$xls_header .= '<th><strong>' . utf8_decode(get_sub_field( 'nombre' )) . '</strong></th>';
		endwhile;

		$xls_header .= '</tr>';
		$xls_end = '</table>';
		$xls_output = $xls_header . $xls_content . $xls_end;
		$file = rand();
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=" . $file . ".xls");
		echo $xls_output;

	}
	exit;
}


function metas_seo(){
	global $wp;
	$output = '';
	$output = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	$output .= '<link rel="canonical" href="'.home_url( $wp->request ).'/inicio">';
	$output .= '<link rel="shortlink" href="'.home_url( $wp->request ).'/inicio">';
	$output .= '<meta property="og:site_name" content="'.get_bloginfo('name').'">';
	$output .= '<meta property="og:type" content="website"/>';
	$output .= '<meta property="og:url" content="'.home_url( $wp->request ).'">';
	$output .= '<meta http-equiv="cache-control" content="today">';

	$output .= '<meta property="og:determiner" content="auto">';
	$output .= '<meta name="twitter:card" content="summary">';
	$output .= '<meta name="twitter:url" content="'.home_url( $wp->request ).'">';

	if(get_post_type(get_the_ID())=='prediccion'){
		$sorteo_title = get_the_title(get_field('sorteo_prediccion',get_the_ID()));
		$title = 'Predicción en sorteo '.$sorteo_title;
		$id_sorteo = get_field('sorteo_prediccion',get_the_ID());
		$img = get_field('imagen_desktop_sorteo',$id_sorteo);
		$array = json_decode(get_field('salones_prediccion', get_the_ID()));
		$descripcion = '';
		while (have_rows('categorias_de_prediccion',$id_sorteo)) : the_row();
								foreach ($array as $key => $ar):
									if($key==get_sub_field('identificador')):
										$categoria = get_sub_field('nombre');
										$salon = $ar;
                                        $nombre_salon = get_the_title($salon);
										$descripcion.= $categoria.': '.$nombre_salon.', ';
									 endif;
								endforeach;
							endwhile;
		$img_url = wp_get_attachment_url($img, 'full');
		$output .= '<meta property="og:title" content="'.$sorteo_title.'">';
		$output .= '<link rel="image_src" href="'.$img_url.'"/>';
		$output .= '<meta name="description" content="'.$descripcion.'"/>';
		$output .= '<meta property="og:description" content="'.$descripcion.'">';
		$output .= '<meta property="og:image:url" content="'.$img_url.'">';
	}
	echo $output;
}
add_action('wp_head', 'metas_seo');

function update_predicciones(){
	$query = new WP_Query(array(
		'post_type' => 'event',
		'posts_per_page' => 99999,
		'post_status' => array('publish'),
	));
	$authors = $query->posts;
	foreach ($authors as $request):
		$update_post = array(
			'post_type' => 'prediccion',
			'ID' => $request->ID,
			'post_status' => 'publish'
		);
		$statusTest = wp_update_post($update_post);
		endforeach;
}

//$este = update_predicciones();
