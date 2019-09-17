<?php

function build_author_vcard( $args ) {

	$post_id = get_the_ID();

	$author = new Themeberger_Post_Functions( 'themeberger', '1.0.1', $post_id );
	$output = $author->build_author_vcard( $args );
	return $output;

}

function get_the_author_vcard( $before = '', $after = '', $post_id = false ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$post_author = new Themeberger_Post_Functions( 'themeberger', '1.0.1', $post_id );

	$output = $post_author->get_author_vcard(
		array(
			'before' => $before,
			'after'  => $after,
		)
	);

	return $output;

}

function the_author_vcard( $before = '', $after = '', $echo = true ) {

	$output = get_the_author_vcard( $before, $after, get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	//All escaping is done in the class (class-themeberger-post-functions.php)
	//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo $output;

}

function get_the_post_date( $before = '', $after = '', $post_id = false ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$post_date = new Themeberger_Post_Functions( 'themeberger', '1.0.1', $post_id );

	$output = $post_date->get_post_date(
		array(
			'before' => $before,
			'after'  => $after,
		)
	);

	return $output;

}

function the_post_date( $before = '', $after = '', $echo = true ) {

	$output = get_the_post_date( $before, $after, get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	//All escaping is done in the class (class-themeberger-post-functions.php)
	//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo $output;

}

function get_the_human_post_date( $before = '', $after = '', $post_id = false ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$human_post_date = new Themeberger_Post_Functions( 'themeberger', '1.0.1', $post_id );

	$output = $human_post_date->get_human_post_date(
		array(
			'before' => $before,
			'after'  => $after,
		)
	);

	return $output;

}

function the_human_post_date( $before = '', $after = '', $echo = true ) {

	$output = get_the_human_post_date( $before, $after, get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	//All escaping is done in the class (class-themeberger-post-functions.php)
	//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo $output;

}

function get_the_permalink_date( $before = '', $after = '', $human_readable = false, $post_id = false ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$permalink_date = new Themeberger_Post_Functions( 'themeberger', '1.0.1', $post_id );

	$output = $permalink_date->get_permalink_date(
		array(
			'before'         => $before,
			'after'          => $after,
			'human_readable' => $human_readable,
		)
	);

	return $output;

}

function the_permalink_date( $before = '', $after = '', $human_readable = false, $echo = true ) {

	$output = get_the_permalink_date( $before, $after, $human_readable, get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	//All escaping is done in the class (class-themeberger-post-functions.php)
	//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo $output;

}

function get_the_shorturl( $before = '', $after = '', $post_id = false ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$shorturl = new Themeberger_Post_Functions( 'themeberger', '1.0.1', $post_id );

	$output = $shorturl->get_shorturl(
		array(
			'before' => $before,
			'after'  => $after,
		)
	);

	return $output;

}

function the_shorturl( $before = '', $after = '', $echo = true ) {

	$output = get_the_shorturl( $before, $after, get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	//All escaping is done in the class (class-themeberger-post-functions.php)
	//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo $output;

}


function get_the_first_image_of_post( $before = '', $after = '', $post_id = false ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$image = new Themeberger_Post_Functions( 'themeberger', '1.0.1', $post_id );

	$output = $image->get_first_image_of_post(
		array(
			'before' => $before,
			'after'  => $after,
		)
	);

	return $output;

}

function the_first_image_of_post( $before = '', $after = '', $echo = true ) {

	$output = get_the_first_image_of_post( $before, $after, get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	//All escaping is done in the class (class-themeberger-post-functions.php)
	//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo $output;

}

function get_the_content_without_first_image( $post_id = false ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$content = new Themeberger_Post_Functions( 'themeberger', '1.0.1', $post_id );

	$output = $content->get_content_without_first_image();

	return $output;

}

function the_content_without_first_image( $echo = true ) {

	$output = get_the_content_without_first_image( get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	//All escaping is done in the class (class-themeberger-post-functions.php)
	//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo $output;

}


function get_the_first_video_of_post( $before = '', $after = '', $post_id = false ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$video = new Themeberger_Post_Functions( 'themeberger', '1.0.1', $post_id );

	$output = $video->get_first_video_of_post(
		array(
			'before' => $before,
			'after'  => $after,
		)
	);

	return $output;

}

function the_first_video_of_post( $before = '', $after = '', $echo = true ) {

	$output = get_the_first_video_of_post( $before, $after, get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	//All escaping is done in the class (class-themeberger-post-functions.php)
	//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo $output;

}

function get_the_content_without_first_video( $post_id = false ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$content = new Themeberger_Post_Functions( 'themeberger', '1.0.1', $post_id );

	$output = $content->get_content_without_first_video();

	return $output;

}

function the_content_without_first_video( $echo = true ) {

	$output = get_the_content_without_first_video( get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	//All escaping is done in the class (class-themeberger-post-functions.php)
	//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo $output;

}


function get_the_first_audio_of_post( $before = '', $after = '', $post_id = false ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$audio = new Themeberger_Post_Functions( 'themeberger', '1.0.1', $post_id );

	$output = $audio->get_first_audio_of_post(
		array(
			'before' => $before,
			'after'  => $after,
		)
	);

	return $output;

}

function the_first_audio_of_post( $before = '', $after = '', $echo = true ) {

	$output = get_the_first_audio_of_post( $before, $after, get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	//All escaping is done in the class (class-themeberger-post-functions.php)
	//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo $output;

}

function get_the_content_without_first_audio( $post_id = false ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$content = new Themeberger_Post_Functions( 'themeberger', '1.0.1', $post_id );

	$output = $content->get_content_without_first_audio();

	return $output;

}

function the_content_without_first_audio( $echo = true ) {

	$output = get_the_content_without_first_audio( get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	//All escaping is done in the class (class-themeberger-post-functions.php)
	//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo $output;

}


function get_the_first_quote_of_post( $before = '', $after = '', $post_id = false ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$quote = new Themeberger_Post_Functions( 'themeberger', '1.0.1', $post_id );

	$output = $quote->get_first_quote_of_post(
		array(
			'before' => $before,
			'after'  => $after,
		)
	);

	return $output;

}

function the_first_quote_of_post( $before = '', $after = '', $echo = true ) {

	$output = get_the_first_quote_of_post( $before, $after, get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	//All escaping is done in the class (class-themeberger-post-functions.php)
	//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo $output;

}

function get_the_content_without_first_quote( $post_id = false ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$content = new Themeberger_Post_Functions( 'themeberger', '1.0.1', $post_id );

	$output = $content->get_content_without_first_quote();

	return $output;

}

function the_content_without_first_quote( $echo = true ) {

	$output = get_the_content_without_first_quote( get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	//All escaping is done in the class (class-themeberger-post-functions.php)
	//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo $output;

}


/* --- */


function get_the_first_gallery_of_post( $before = '', $after = '', $post_id = false ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$gallery = new Themeberger_Post_Functions( 'themeberger', '1.0.1', $post_id );

	$output = $gallery->get_first_gallery_of_post(
		array(
			'before' => $before,
			'after'  => $after,
		)
	);

	return $output;

}

function the_first_gallery_of_post( $before = '', $after = '', $echo = true ) {

	$output = get_the_first_gallery_of_post( $before, $after, get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	//All escaping is done in the class (class-themeberger-post-functions.php)
	//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo $output;

}

function get_the_content_without_first_gallery( $post_id = false ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$content = new Themeberger_Post_Functions( 'themeberger', '1.0.1', $post_id );

	$output = $content->get_content_without_first_gallery();

	return $output;

}

function the_content_without_first_gallery( $echo = true ) {

	$output = get_the_content_without_first_gallery( get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	//All escaping is done in the class (class-themeberger-post-functions.php)
	//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo $output;

}


function get_the_content_meta( $post_id = false ) {

	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	ob_start();
	?>

	<data itemprop="name headline"><?php echo get_the_title( $post_id ); ?></data>
	<data itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php echo get_the_permalink( $post_id ); ?>"><?php echo get_the_permalink( $post_id ); ?></data>
	<data itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
		<data itemprop="name"><?php tb_helper_defaultpublishername(); ?></data>
		<data itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
			<data itemprop="url"><?php tb_helper_defaultpublisherlogo(); ?></data>
		</data>
	</data>
	<?php if ( ! has_post_thumbnail( $post_id ) ) : ?>
		<data itemprop="image"><?php tb_helper_defaultcover(); ?></data>
	<?php else : ?>
		<data itemprop="image"><?php echo get_the_post_thumbnail_url( $post_id ); ?></data>
	<?php endif; ?>

	<?php
	$content = ob_get_clean();

	$output = $content;

	return $output;

}

function the_content_meta( $echo = true ) {

	$output = get_the_content_meta( get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	//All escaping is done in the function get_the_content_meta
	//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo $output;

}
