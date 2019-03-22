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
 * @package themebergertest
 */

get_header(); ?>

		<?php do_action ( 'themeberger_before_page' ); ?>

		<div id="page" class="site">

			<?php get_template_part( 'template-parts/header' ); ?>

			<div id="content" class="site-content">

				<?php do_action ( 'themeberger_before_primary' ); ?>
				<div id="primary" class="content-area">
					<main id="main" class="site-main">
					<?php do_action ( 'themeberger_before_content' ); ?>

					<?php
					if ( have_posts() ) :

						if ( is_home() && ! is_front_page() ) :
							?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
							<?php
						endif;

						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/content', get_post_type() );
						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>

					<?php if ( ! is_home() && is_front_page() ) : ?>
						<?php do_action( 'themeberger_homepage' ); ?>
					<?php endif; ?>

					<?php do_action ( 'themeberger_after_content' ); ?>
					</main><!-- #main -->
				</div><!-- #primary -->
				<?php do_action ( 'themeberger_after_primary' ); ?>

				<?php get_sidebar(); ?>

			</div><!-- #content -->
			
			<?php get_template_part( 'template-parts/footer' ); ?>

		</div><!-- #page -->

		<?php do_action ( 'themeberger_after_page' ); ?>

<?php get_footer();