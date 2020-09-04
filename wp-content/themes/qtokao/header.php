<?php
/**
 * Header file for the Padit theme.
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php
wp_body_open();
?>
<header id="header" class="header site-header" role="banner">
    <div class="header-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex align-items-center header-inner-row-1">
					<?php
					ob_start();
					?>
                    <div class="header-logo d-flex align-items-center flex-1">
                        <div class="header-logo-image">
							<?php echo get_custom_logo(); ?>
                        </div>
                    </div>
                    <div class="">
	                    <?php wp_nav_menu( array( 'theme_location' => 'main_menu' ) ); ?>
                    </div>

                    <div class="header-suscribirse">
                        <?php if(is_user_logged_in()): ?>
                            <a href="<?php echo wp_logout_url(); ?>">Salir</a>
                        <?php else: ?>
                            <a href="<?php echo wp_login_url(); ?>">Entrar / Registro</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
