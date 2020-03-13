<?php
/**
 * Bookmark Template
 * The Goal of this Template is to be a general all-purpose model that will be replaced by customization in other templates
 *
 * @link https://github.com/dshanske/indieweb-post-kinds
 *
 * @package themebergerbasic
 */

$author = array();
if ( isset( $cite['author'] ) ) {
	$cite['author']['image'] = null;
	$cite['author']['class'] = 'response-author';
	$author                  = build_author_vcard( $cite['author'] );
}

$url = '';
if ( isset( $cite['url'] ) ) {
	$url = $cite['url'];
}

$site_name  = Kind_View::get_site_name( $cite );
$kind_title = Kind_View::get_cite_title( $cite );
$kind_title = null;
if ( array_key_exists( 'name', $cite ) ) {
	$kind_title = $cite['name'];
}

$embed    = self::get_embed( $url );
$duration = $mf2_post->get( 'duration', true );
if ( ! $duration ) {
		$duration = calculate_duration( $mf2_post->get( 'dt-start' ), $mf2_post->get( 'dt-end' ) );
}

$kind = get_post_kind_slug( get_the_ID() );
$rsvp = $mf2_post->get( 'rsvp', true );

$published = null;
if ( array_key_exists( 'published', $cite ) ) {
	$published_ago           = human_time_diff( date( 'U', strtotime( $cite['published'] ) ), current_time( 'timestamp' ) );
	$published_ago_timestamp = date( 'c', strtotime( $cite['published'] ) );
	$published_ago           = sprintf(
		/* translators: %s = human-readable time difference */
		esc_html__( '%s ago', 'themeberger-basic' ),
		$published_ago
	);
	$date_string = '<span class="response-date"><a class="u-url" href="%3$s"><time class="published updated dt-published dt-updated" datetime="%1$s">%2$s</time></a></span>';
	$published   = sprintf(
		$date_string,
		$published_ago_timestamp,
		$published_ago,
		$url
	);
}

if ( ! $kind ) {
	return;
}

$kind_type = '';
if ( ! empty( $type ) ) {
	$kind_type   = 'p-' . $type;
	$kind_type_x = ( empty( $url ) ? 'p-' : 'u-' ) . $type;
}
?>

<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
<section class="h-cite response <?php echo $kind_type; ?> ">
	<div class="response-meta">
		<?php
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo Kind_Taxonomy::get_before_kind( $kind );
		if ( ! $embed ) {
			if ( ! empty( $author ) ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $author . ' ' . $published;
			}
			if ( in_array( $kind, array( 'jam', 'listen', 'play', 'read', 'watch', 'audio', 'video' ), true ) ) {
				if ( $duration ) {
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo '(<data class="p-duration" value="' . $duration . '">' . Kind_View::display_duration( $duration ) . '</data>)';
				}
			}
		}
		?>
	</div>
	<div class="response-content e-summary">
		<?php
		if ( $kind_title ) {
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo '<p class="response-title"><strong>' . $kind_title . '</strong></p>';
		}
		if ( $cite && is_array( $cite ) ) {
			if ( $embed ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo sprintf( '<p>%1s</p>', $embed );
			} elseif ( array_key_exists( 'summary', $cite ) ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo sprintf( '<p>%1s</p>', $cite['summary'] );
			}
		}
		if ( $rsvp ) {
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo 'RSVP <span class="p-rsvp">' . $rsvp . '</span>';
		}
		?>
	</div>
</section>
<?php
