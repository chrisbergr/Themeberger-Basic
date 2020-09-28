
			<?php if ( is_search() ) : // SEARCH RESULTS PAGE ?>
				<?php
				$searchtitle = sprintf(
					/* translators: %s: Search term visible in the title */
					esc_html__( 'Search Results for &#8220;%s&#8221;', 'themeberger-basic' ),
					get_search_query()
				);
				?>
				<h1 class="site-description"><?php echo esc_html( $searchtitle ); ?></h1>
			<?php endif; ?>
