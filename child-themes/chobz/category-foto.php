<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themebergerbasic
 */

function first_img( $image, $post ) {
	$image = preg_replace( '/srcset="([^"]*)"/', '', $image );
	$image = preg_replace( '/data-srcset="([^"]*)"/', '', $image );
	$image = preg_replace( '/sizes="([^"]*)"/', '', $image );
	$image = preg_replace_callback(
		'/src="([^"]*)"/',
		function ( $src ) {
			$src    = $src[0];
			$src    = str_replace( 'src="', '', $src );
			$src    = str_replace( '"', '', $src );
			$src_id = attachment_url_to_postid( $src );
			if ( 0 < $src_id ) {
				$src = wp_get_attachment_image_url( $src_id, 'thumbnail' );
			}
			return 'src="' . $src . '"';
		},
		$image
	);
	$image = '<a href="' . get_permalink( $post ) . '">' . $image . '</a>';
	return $image;
}
add_filter( 'themeberger_first_image_of_post', 'first_img', 5, 5 );


get_header(); ?>

		<?php do_action( 'themeberger_before_page' ); ?>

		<div id="page" class="site">

			<?php marlon_get_template_part( 'template-parts/header' ); ?>

			<div id="content" class="site-content">

				<?php do_action( 'themeberger_before_primary' ); ?>
				<div id="primary-content" class="content-area">
					<main id="main" class="site-main<?php echo is_singular() ? ' main-single' : ' hfeed h-feed photostream" itemscope itemtype="http://schema.org/Collection'; ?>">
					<?php do_action( 'themeberger_before_content' ); ?>

					<?php if ( have_posts() ) : ?>

						<?php

						if ( is_home() && ! is_front_page() ) :
							?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
							<?php
						endif;

						while ( have_posts() ) :
							the_post();
							$this_type   = get_post_type();
							$this_format = get_post_format() ? : 'standard';
							$this_kind   = 'note';

							if ( function_exists( 'has_post_kind' ) && has_post_kind() ) {
								$this_kind = strtolower( get_post_kind() );
							}

							if ( 'standard' === $this_format && 'note' !== $this_kind ) {
								$this_format = $this_kind;
							}

							$template = $this_type . '-' . $this_format;
							marlon_get_template_part( 'template-parts/content', $template );
						endwhile;

						the_posts_navigation();

						the_posts_pagination(
							array(
								'mid_size'  => 2,
								'prev_text' => false,
								'next_text' => false,
							)
						);

						?>

					<?php else : ?>
						<?php marlon_get_template_part( 'template-parts/content', 'none' ); ?>
					<?php endif; ?>

					<?php if ( ! is_home() && is_front_page() ) : ?>
						<?php do_action( 'themeberger_homepage' ); ?>
					<?php endif; ?>

					<?php do_action( 'themeberger_after_content' ); ?>
					</main><!-- #main -->
				</div><!-- #primary-content -->
				<?php do_action( 'themeberger_after_primary' ); ?>

				<?php get_sidebar(); ?>

			</div><!-- #content -->

			<?php marlon_get_template_part( 'template-parts/footer' ); ?>

		</div><!-- #page -->

		<?php do_action( 'themeberger_after_page' ); ?>

<?php
get_footer();
