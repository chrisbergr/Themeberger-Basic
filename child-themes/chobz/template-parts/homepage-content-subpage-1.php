<?php
/**
 * Template partial for subcontent of front page
 *
 * @package themebergerbasic
 */

 if ( has_post_thumbnail() ) {
 	$curr_id       = $post->ID;
 	$content_image = get_the_post_thumbnail_url( $curr_id, 'post-thumbnail' );
 } else {
 	$content_image = false;
 }

?>

<article id="post-<?php the_ID(); ?>" class="content subcontent demo-1 cda-alignright cda-naked cda-noimg"<?php //post_class( 'content subcontent' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
	<div class="subcontent-image"><?php the_post_thumbnail(); ?></div>
	<?php endif; ?>

	<?php /*
	<header class="subcontent-header">
		<h2 class="subcontent-title"><?php echo get_the_title(); ?></h2>
	</header><!-- .entry-header -->
	*/ ?>


	<div class="subcontent-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->


	<div class="scrollarea">
		<div class="scrollarea-header">
			<h2 class="scrollarea-title"><?php echo get_the_title(); ?></h2>
			<div class="scrollarea-arrows"><a class="arrow arrow-prev disabled"></a><a class="arrow arrow-next"></a></div>
		</div>
		<ul class="slider">

			<?php $the_query = new WP_Query( array( 'category_name' => 'artikel' ) ); ?>

			<?php if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<?php if ( has_post_thumbnail() ) : ?>
					<li class="slide">
						<div class="slide-image-wrapper"><img class="slide-image" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"></div>
						<div class="slide-description">
							<span class="slide-kicker"><?php the_permalink_date( '', ' | ', false ); ?><?php the_category( ', ' ); ?><?php the_kicker( ' | ' ); ?></span>
							<span class="slide-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
							<span class="slide-subtitle"><?php the_subtitle(); ?></span>
						</div>
						<div class="slide-meta">
							<a href="<?php the_permalink(); ?>">Read article</a>
						</div>
					</li>
					<?php endif; ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>

			<?php if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<?php if ( has_post_thumbnail() ) : ?>
					<li class="slide">
						<div class="slide-image-wrapper"><img class="slide-image" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"></div>
						<div class="slide-description">
							<span class="slide-kicker"><?php the_permalink_date( '', ' | ', false ); ?><?php the_category( ', ' ); ?><?php the_kicker( ' | ' ); ?></span>
							<span class="slide-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
							<span class="slide-subtitle"><?php the_subtitle(); ?></span>
						</div>
						<div class="slide-meta">
							<a href="<?php the_permalink(); ?>">Read article</a>
						</div>
					</li>
					<?php endif; ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>

			<?php if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<?php if ( has_post_thumbnail() ) : ?>
					<li class="slide">
						<div class="slide-image-wrapper"><img class="slide-image" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"></div>
						<div class="slide-description">
							<span class="slide-kicker"><?php the_permalink_date( '', ' | ', false ); ?><?php the_category( ', ' ); ?><?php the_kicker( ' | ' ); ?></span>
							<span class="slide-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
							<span class="slide-subtitle"><?php the_subtitle(); ?></span>
						</div>
						<div class="slide-meta">
							<a href="<?php the_permalink(); ?>">Read article</a>
						</div>
					</li>
					<?php endif; ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>

		</ul>
	</div>

	<div class="background-block full-width-block" style="background-color: #fff;"></div>

<?php /*

	<section class="x-content | scrollarea-ctn">
	    <div class="scrollarea | slideshow">
	        <ul class="slideshow-list">
	            <li class="slideshow-list__el">
	                <article class="tile | js-tile">
	                    <a href="#">
	                        <figure class="tile__fig">
	                            <img src="https://tympanus.net/Tutorials/GooeyImageHoverEffects/dist/img/tiles/woods/base.jpg" data-hover="https://tympanus.net/Tutorials/GooeyImageHoverEffects/dist/img/tiles/woods/hover.jpg" alt="Woods & Forests" class="tile__img">
	                        </figure>
	                        <div class="tile__content">
	                            <h2 class="tile__title | title title--medium ">Woods & <span class="title__offset title__offset--medium">Forests</span></h2>
	                            <div class="tile__cta">
	                                <span class="btn-inline">See more</span>
	                            </div>
	                        </div>
	                    </a>
	                </article>
	            </li>
	            <li class="slideshow-list__el">
	                <article class="tile | js-tile">
	                    <a href="#">
	                        <figure class="tile__fig">
	                            <img src="https://tympanus.net/Tutorials/GooeyImageHoverEffects/dist/img/tiles/rocks/base.jpg" data-hover="https://tympanus.net/Tutorials/GooeyImageHoverEffects/dist/img/tiles/rocks/hover.jpg" alt="Rocks & Mountains" class="tile__img">
	                        </figure>
	                        <div class="tile__content">
	                            <h2 class="tile__title | title title--medium ">Rocks & <span class="title__offset title__offset--medium">Mountains</span></h2>
	                            <div class="tile__cta">
	                                <span class="btn-inline">See more</span>
	                            </div>
	                        </div>
	                    </a>
	                </article>
	            </li>
	            <li class="slideshow-list__el">
	                <article class="tile | js-tile">
	                    <a href="#">
	                        <figure class="tile__fig">
	                            <img src="https://tympanus.net/Tutorials/GooeyImageHoverEffects/dist/img/tiles/cities/base.jpg" data-hover="https://tympanus.net/Tutorials/GooeyImageHoverEffects/dist/img/tiles/cities/hover.jpg" alt="Cities & Skylines" class="tile__img">
	                        </figure>
	                        <div class="tile__content">
	                            <h2 class="tile__title | title title--medium ">Cities & <span class="title__offset title__offset--medium">Skylines</span>
	                                </spa>
	                            </h2>
	                            <div class="tile__cta">
	                                <span class="btn-inline">See more</span>
	                            </div>
	                        </div>
	                    </a>
	                </article>
	            </li>
	            <li class="slideshow-list__el">
	                <article class="tile | js-tile">
	                    <a href="#">
	                        <figure class="tile__fig">
	                            <img src="https://tympanus.net/Tutorials/GooeyImageHoverEffects/dist/img/tiles/deserts/base.jpg" data-hover="https://tympanus.net/Tutorials/GooeyImageHoverEffects/dist/img/tiles/deserts/hover.jpg" alt="SAND & DESERTS" class="tile__img">
	                        </figure>
	                        <div class="tile__content">
	                            <h2 class="tile__title | title title--medium ">Sand & <span class="title__offset title__offset--medium">Deserts</span>
	                                </spa>
	                            </h2>
	                            <div class="tile__cta">
	                                <span class="btn-inline">See more</span>
	                            </div>
	                        </div>
	                    </a>
	                </article>
	            </li>
	            <li class="slideshow-list__el">
	                <article class="tile | js-tile">
	                    <a href="#">
	                        <figure class="tile__fig">
	                            <img src="https://tympanus.net/Tutorials/GooeyImageHoverEffects/dist/img/tiles/snow/base.jpg" data-hover="https://tympanus.net/Tutorials/GooeyImageHoverEffects/dist/img/tiles/snow/hover.jpg" alt="Snow & Mountains" class="tile__img">
	                        </figure>
	                        <div class="tile__content">
	                            <h2 class="tile__title | title title--medium ">Snow & <span class="title__offset title__offset--medium">Mountains</span>
	                                </spa>
	                            </h2>
	                            <div class="tile__cta">
	                                <span class="btn-inline">See more</span>
	                            </div>
	                        </div>
	                    </a>
	                </article>
	            </li>
	        </ul>
	    </div>
	    <div class="slideshow__progress-ctn"><span class="slideshow__progress"></span></div>
	</section>

    <canvas id="scene"></canvas>

*/ ?>

</article><!-- #post-<?php the_ID(); ?> -->
