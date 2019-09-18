<?php
 /**
  * Favorite Template
  * The Goal of this Template is to be a general all-purpose model that will be replaced by customization in other templates
  *
  * @link https://github.com/dshanske/indieweb-post-kinds
  *
  * @package themebergerbasic
  */


//$mf2_post = new MF2_Post( get_the_ID() );
//$cite     = $mf2_post->fetch();
$author   = array();
//$author	  = $mf2_post->get( 'author', true );
//print_r($author);
//die();
//print_r($cite);
//die();
if ( isset( $cite['author'] ) ) {
//if ( $author ) {
	//$author = Kind_View::get_hcard( $cite['author'] );
	//$author = build_hcard( $cite['author'] );
	//$author = build_hcard( $author['properties'] );
	$cite['author']['image'] = null;
	$cite['author']['class'] = 'response-author';
	$author = build_author_vcard( $cite['author'] );
}
//print_r($cite['author']);
//die();
$url = '';
if ( isset( $cite['url'] ) ) {
	$url = $cite['url'];
}
$site_name = Kind_View::get_site_name( $cite );
$title     = Kind_View::get_cite_title( $cite );
$title = null;
if ( array_key_exists( 'name', $cite ) ) {
	$title = $cite['name'];
}
$embed     = self::get_embed( $url );
$duration  = $mf2_post->get( 'duration', true );
if ( ! $duration ) {
		$duration = calculate_duration( $mf2_post->get( 'dt-start' ), $mf2_post->get( 'dt-end' ) );
}
$kind = get_post_kind_slug( get_the_ID() );
$rsvp = $mf2_post->get( 'rsvp', true );


//$test     = Kind_View::get_attributes( array( 'properties' => 'published' ) );

$published = null;
if ( array_key_exists( 'published', $cite ) ) {
	$published = human_time_diff( date( 'U', strtotime( $cite[ 'published' ] ) ), current_time( 'timestamp' ) );
	$published = sprintf(
		_x( '<span class="response-date">%s</span>', '%s = human-readable time difference', '@@textdomain' ),
		'<a class="u-in-reply-to" rel="in-reply-to" href="' . $url . '">' . $published . ' ago</a>'
	);
}

//print_r($cite);
//die();

if ( ! $kind ) {
	return;
}

// Add in the appropriate type
//$type = Kind_Taxonomy::get_kind_info( $kind, 'property' );
if ( ! empty( $type ) ) {
	$type = 'p-' . $type;
}
// Add in the appropriate type
//if ( ! empty( $type ) ) {
//	$type = ( empty( $url ) ? 'p-' : 'u-' ) . $type;
//}
?>

<section class="h-cite response <?php echo $type; ?> ">
<div class="response-meta">
<?php
echo Kind_Taxonomy::get_before_kind( $kind );
//$title = str_replace( 'u-url"', str_replace( 'p-', 'u-', $type ) . '" rel="in-reply-to"', $title );
//$title = str_replace( 'p-name ', '', $title );
	//print_r($title);
	//print_r($before_kind);
	//die();
if ( ! $embed ) {
	if ( ! empty( $author ) ) {
		echo $author . ' ' . $published;
	}
	//if ( $site_name ) {
	//	echo ' <em>(' . $site_name . ')</em>';
	//}
	if ( in_array( $kind, array( 'jam', 'listen', 'play', 'read', 'watch', 'audio', 'video' ) ) ) {
		if ( $duration ) {
			echo '(<data class="p-duration" value="' . $duration . '">' . Kind_View::display_duration( $duration ) . '</data>)';
		}
	}
}
?>
</div>
<div class="response-content e-summary">
<?php
if ( $title ) {
	echo '<p class="response-title"><strong>' . $title . '</strong></p>';
}
if ( $cite && is_array( $cite ) ) {
	if ( $embed ) {
		echo sprintf( '<p>%1s</p>', $embed );
	} elseif ( array_key_exists( 'summary', $cite ) ) {
		echo sprintf( '<p>%1s</p>', $cite['summary'] );
	}
}

if ( $rsvp ) {
	echo 'RSVP <span class="p-rsvp">' . $rsvp . '</span>';
}

// Close Response
?>
</div>
</section>
<?php
