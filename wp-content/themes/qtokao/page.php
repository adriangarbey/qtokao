<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) :
        the_post(); ?>
        <section class="page-title bg-size--cover bg-pos--center" style="background-image:url(<?php echo wp_get_attachment_url(get_field('page_header_image')); ?>);">
            <div class="page-title__container container--medium">
                <h1 class="page-title__title"><?php echo get_the_title(); ?></h1>
                <p class="page-title__content"><?php echo get_field('page_subtitle'); ?></p>
            </div>
        </section>

        <section class="page-section">
            <div class="container--xsmall">
                <div class="content-area wp-image__wrapper">
                    <?php the_content(); ?>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>

