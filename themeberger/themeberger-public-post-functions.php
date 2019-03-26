<?php

// The used class PostFunctions is located in ./themeberger-public-post-functions-class.php

function get_the_author_vcard( $before = '', $after = '', $post_id = false ) {

	if ( ! $post_id )
		$post_id = get_the_ID();

	$post_author = new PostFunctions( 'themeberger', '1.0.1', $post_id );

	$output = $post_author->get_author_vcard( array(
		'before' => $before,
		'after'  => $after
	) );

	return $output;

}

function the_author_vcard( $before = '', $after = '', $echo = true ) {

	$output = get_the_author_vcard( $before, $after, get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}
	
	$output;

}

function get_the_post_date( $before = '', $after = '', $post_id = false ) {

	if ( ! $post_id )
		$post_id = get_the_ID();

	$post_date = new PostFunctions( 'themeberger', '1.0.1', $post_id );

	$output = $post_date->get_post_date( array(
		'before' => $before,
		'after'  => $after
	) );

	return $output;

}

function the_post_date( $before = '', $after = '', $echo = true ) {

	$output = get_the_post_date( $before, $after, get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	echo $output;

}

function get_the_human_post_date( $before = '', $after = '', $post_id = false ) {

	if ( ! $post_id )
		$post_id = get_the_ID();

	$human_post_date = new PostFunctions( 'themeberger', '1.0.1', $post_id );

	$output = $human_post_date->get_human_post_date( array(
		'before' => $before,
		'after'  => $after
	) );

	return $output;

}

function the_human_post_date( $before = '', $after = '', $echo = true ) {

	$output = get_the_human_post_date( $before, $after, get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	echo $output;

}

function get_the_permalink_date( $before = '', $after = '', $human_readable = false, $post_id = false ) {

	if ( ! $post_id )
		$post_id = get_the_ID();

	$permalink_date = new PostFunctions( 'themeberger', '1.0.1', $post_id );

	$output = $permalink_date->get_permalink_date( array(
		'before' => $before,
		'after'  => $after,
		'human_readable' => $human_readable,
	) );

	return $output;

}

function the_permalink_date( $before = '', $after = '', $human_readable = false, $echo = true ) {

	$output = get_the_permalink_date( $before, $after, $human_readable, get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	echo $output;

}

function get_the_shorturl( $before = '', $after = '', $post_id = false ) {

	if ( ! $post_id )
		$post_id = get_the_ID();

	$shorturl = new PostFunctions( 'themeberger', '1.0.1', $post_id );

	$output = $shorturl->get_shorturl( array(
		'before' => $before,
		'after'  => $after,
	) );

	return $output;

}

function the_shorturl( $before = '', $after = '', $echo = true ) {

	$output = get_the_shorturl( $before, $after, get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	echo $output;

}


function get_the_first_image_of_post( $before = '', $after = '', $post_id = false ) {

	if ( ! $post_id )
		$post_id = get_the_ID();

	$image = new PostFunctions( 'themeberger', '1.0.1', $post_id );

	$output = $image->get_first_image_of_post( array(
		'before' => $before,
		'after'  => $after
	) );

	return $output;

}

function the_first_image_of_post( $before = '', $after = '', $echo = true ) {

	$output = get_the_first_image_of_post( $before, $after, get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	echo $output;

}

function get_the_content_without_first_image( $post_id = false ) {

	if ( ! $post_id )
		$post_id = get_the_ID();

	$content = new PostFunctions( 'themeberger', '1.0.1', $post_id );

	$output = $content->get_content_without_first_image();

	return $output;

}

function the_content_without_first_image( $echo = true ) {

	$output = get_the_content_without_first_image( get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	echo $output;

}


function get_the_first_video_of_post( $before = '', $after = '', $post_id = false ) {

	if ( ! $post_id )
		$post_id = get_the_ID();

	$video = new PostFunctions( 'themeberger', '1.0.1', $post_id );

	$output = $video->get_first_video_of_post( array(
		'before' => $before,
		'after'  => $after
	) );

	return $output;

}

function the_first_video_of_post( $before = '', $after = '', $echo = true ) {

	$output = get_the_first_video_of_post( $before, $after, get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	echo $output;

}

function get_the_content_without_first_video( $post_id = false ) {

	if ( ! $post_id )
		$post_id = get_the_ID();

	$content = new PostFunctions( 'themeberger', '1.0.1', $post_id );

	$output = $content->get_content_without_first_video();

	return $output;

}

function the_content_without_first_video( $echo = true ) {

	$output = get_the_content_without_first_video( get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	echo $output;

}


function get_the_first_audio_of_post( $before = '', $after = '', $post_id = false ) {

	if ( ! $post_id )
		$post_id = get_the_ID();

	$audio = new PostFunctions( 'themeberger', '1.0.1', $post_id );

	$output = $audio->get_first_audio_of_post( array(
		'before' => $before,
		'after'  => $after
	) );

	return $output;

}

function the_first_audio_of_post( $before = '', $after = '', $echo = true ) {

	$output = get_the_first_audio_of_post( $before, $after, get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	echo $output;

}

function get_the_content_without_first_audio( $post_id = false ) {

	if ( ! $post_id )
		$post_id = get_the_ID();

	$content = new PostFunctions( 'themeberger', '1.0.1', $post_id );

	$output = $content->get_content_without_first_audio();

	return $output;

}

function the_content_without_first_audio( $echo = true ) {

	$output = get_the_content_without_first_audio( get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	echo $output;

}


function get_the_first_quote_of_post( $before = '', $after = '', $post_id = false ) {

	if ( ! $post_id )
		$post_id = get_the_ID();

	$quote = new PostFunctions( 'themeberger', '1.0.1', $post_id );

	$output = $quote->get_first_quote_of_post( array(
		'before' => $before,
		'after'  => $after
	) );

	return $output;

}

function the_first_quote_of_post( $before = '', $after = '', $echo = true ) {

	$output = get_the_first_quote_of_post( $before, $after, get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	echo $output;

}

function get_the_content_without_first_quote( $post_id = false ) {

	if ( ! $post_id )
		$post_id = get_the_ID();

	$content = new PostFunctions( 'themeberger', '1.0.1', $post_id );

	$output = $content->get_content_without_first_quote();

	return $output;

}

function the_content_without_first_quote( $echo = true ) {

	$output = get_the_content_without_first_quote( get_the_ID() );

	if ( ! $echo ) {
		return $output;
	}

	echo $output;

}
