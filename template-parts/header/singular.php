
			<?php if ( is_singular() ) : // SINGULAR POST ?>
				<?php
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
				?>
				<?php if ( 'post-standard' === $template ) : ?>
					<div class="site-info--left">
						<?php //the_kicker( '<h6 class="entry-kicker page-kicker">', '</h6>' ); ?>
						<?php the_title( '<h1 class="entry-title page-title">', '</h1>' ); ?>
						<?php //the_subtitle( '<h4 class="entry-subtitle page-subtitle">', '</h4>' ); ?>
					</div><!-- .site-info-left -->
					<div class="site-info--right">
						<h6 class="entry-category-date page-category-date"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo get_the_date(); ?></a><br><?php the_category( ', ' ); ?></h6>
					</div><!-- .site-info-right -->
				<?php endif; ?>
			<?php endif; ?>
