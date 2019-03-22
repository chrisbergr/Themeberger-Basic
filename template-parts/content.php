<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themebergertest
 */

function strip_single_tag( $str, $tag ) {
    $str1 = preg_replace( '/<\/' . $tag . '>/i', '', $str );
    if( $str1 != $str ) {
        $str = preg_replace( '/<' . $tag . '[^>]*>/i', '', $str1 );
    }
    return $str;
}

function themebergerautop( $content ){
    $tag = 'p';
    $content = strip_single_tag( $content, $tag );
    return $content;
}

//remove_filter( 'the_excerpt', 'wpautop' );
add_filter( 'the_excerpt', 'themebergerautop', 88 );


if ( has_post_thumbnail() && ! is_archive() ) {
	$curr_id = is_home() ? get_queried_object_id() : $post->ID;
	$content_image = get_the_post_thumbnail_url( $curr_id, 'post-thumbnail' );
} else {
	$content_image = false;
}

$current = $post->post_name;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content' ); ?>>
	<?php if ( $content_image ) : ?>
	<div class="entry-image" style="background-image: url(<?php echo $content_image; ?>);"></div>
	<?php endif; ?>
	
	<?php /*if ( ! is_home() && is_front_page() ) : ?>
		<?php do_action( 'opening' ); ?>
	<?php endif;*/ ?>
	
	<header class="entry-header">
		UPDATED!
		<?php if ( is_singular() ) : ?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php else : ?>
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<?php endif; ?>
		<?php if ( has_excerpt() ) : ?>
		<h4 class="entry-intro"><?php the_excerpt( ''); ?></h4>
		<?php endif; ?>
		<?php /*if ( is_active_sidebar( 'hero' ) ) : ?>
		<div class="herowidgets">
		<?php dynamic_sidebar( 'hero' ); ?>
		</div>
		<?php endif;*/ ?>
	</header><!-- .entry-header -->
	
	<?php if ( $current === 'shop' ) : ?>
		<?php //do_action( 'theshop' ); ?>
	<?php endif; ?>

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', '_s' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //_s_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->