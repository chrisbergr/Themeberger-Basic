<?php
 /**
  * Default Template
  * The Goal of this Template is to be a general all-purpose model that will be replaced by customization in other templates
  *
  * @link https://github.com/dshanske/indieweb-post-kinds
  *
  * @package themebergertest
  */

if ( ! function_exists( 'build_hcard' ) ) :
function build_hcard( $author ) {

	if ( ! is_array( $author ) ) {
		return false;
	}

	//[name] => Webmention Rocks!
    //[url] => https://webmention.rocks/
    //[photo] => https://webmention.rocks/assets/webmention-rocks-icon.png

	$default = array(
			'name'  => 'Unkown',
			'url'   => null,
			'photo' => null,
		);
	$author = wp_parse_args( $author, $default );

	/*
	<span class="author p-author vcard hcard h-card" itemprop="author" itemscope itemtype="http://schema.org/Person">
		<a class="url u-url" itemprop="url" rel="author" href="http://wpbeta.localhost/?author=1">
			<img class="photo u-photo avatar" itemprop="image" src="http://2.gravatar.com/avatar" alt="Christian Hockenberger"><span class="name p-name fn" itemprop="name">Christian Hockenberger</span>
		</a>
	</span>
	*/

	$name = sprintf( '<span class="name p-name fn">%1s</span>', $author['name'] );
	$avatar = '';
	if ( $author['photo']) {
		$avatar = sprintf( '<img class="photo u-photo avatar" src="%1s" alt="%2s">', $author['photo'], $author['name'] );
	}
	$author_str = $avatar . $name;

	if ( $author['url']) {
		$author_str = sprintf( '<a class="url u-url" href="%1s">%2s</a>', $author['url'], $author_str );
	}

	return sprintf( '<span class="author p-author vcard hcard h-card">%1s</span>', $author_str );

}
endif;

//$mf2_post = new MF2_Post( get_the_ID() );
//$cite     = $mf2_post->fetch();
$author   = array();
//$author	  = $mf2_post->get( 'author', true );
//print_r($author);
//die();
if ( isset( $cite['author'] ) ) {
//if ( $author ) {
	//$author = Kind_View::get_hcard( $cite['author'] );
	$author = build_hcard( $cite['author'] );
	//$author = build_hcard( $author['properties'] );
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
		_x( '<small>&sdot; %s ago</small>', '%s = human-readable time difference', '@@textdomain' ),
		'<a class="u-in-reply-to" rel="in-reply-to" href="' . $url . '">' . $published . '</a>'
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

<section class="montreal h-cite response <?php echo $type; ?> ">
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
<div class="response-content">
<?php
if ( $title ) {
	echo '<p><strong>' . $title . '</strong></p>';
}
if ( $cite && is_array( $cite ) ) {
	if ( $embed ) {
		echo sprintf( '<blockquote class="e-summary">%1s</blockquote>', $embed );
	} elseif ( array_key_exists( 'summary', $cite ) ) {
		echo sprintf( '<blockquote class="e-summary">%1s</blockquote>', $cite['summary'] );
	}
}

if ( $rsvp ) {
	echo 'RSVP <span class="p-rsvp">' . $rsvp . '</span>';
}

// Close Response
?>
</div>
</section>
XOXO--
<?php
