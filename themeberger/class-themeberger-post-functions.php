<?php
/**
 * Post Functions
 *
 * @link       https://mediaberger.com
 * @since      1.0.0
 *
 * @package    Themeberger
 * @subpackage Themeberger/public/partials
 */
class Themeberger_Post_Functions {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The ID of the current post.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      int    $post_id    The ID of the current post.
	 */
	private $post_id = 0;

	/**
	 * The current post.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      int    $post_id    The ID of the current post.
	 */
	private $post = null;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version, $post ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		if ( is_a( $post, 'WP_Post' ) ) {
			$this->post_id = absint( $post->ID );
			$this->post    = $post;
		} else {
			$this->post_id = absint( $post );
			$this->post    = get_post( $this->post_id );
		}

	}


	public function get_author_vcard( $args = '' ) {

		$args = wp_parse_args(
			$args,
			array(
				'before' => '',
				'after'  => '',
			)
		);

		$author_id = get_post_field( 'post_author', $this->post_id );
		$avatar    = get_avatar(
			$author_id,
			50,
			null,
			esc_html( get_the_author_meta( 'display_name', $author_id ) ),
			array(
				'class'      => 'photo u-photo avatar xbergr',
				'extra_attr' => 'itemprop="image"',
			)
		);

		$author = '<span class="author themeberger-author p-author vcard hcard h-card" itemprop="author" itemscope itemtype="http://schema.org/Person"><a class="url u-url" itemprop="url" rel="author" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID', $author_id ) ) ) . '">' . $avatar . '<span class="name p-name fn" itemprop="name">' . esc_html( get_the_author_meta( 'display_name', $author_id ) ) . '</span></a></span>';
		$author = apply_filters( 'themeberger_author_vcard', $author, $this->post );
		$author = $args['before'] . $author . $args['after'];

		return $author;

	}

	public function get_post_date( $args = '' ) {

		$args = wp_parse_args(
			$args,
			array(
				'before' => '',
				'after'  => '',
			)
		);

		$date_string = '<time class="entry-date published updated dt-published dt-updated" itemprop="datePublished dateModified" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U', $this->post ) !== get_the_modified_time( 'U', $this->post ) ) {
			$date_string = '<time class="entry-date published dt-published" itemprop="datePublished" datetime="%1$s">%2$s</time><time class="updated dt-updated" itemprop="dateModified" datetime="%3$s">%4$s</time>';
		}
		$post_date = sprintf(
			$date_string,
			esc_attr( get_the_date( 'c', $this->post ) ),
			esc_html( get_the_date( '', $this->post ) ),
			esc_attr( get_the_modified_date( 'c', $this->post ) ),
			esc_html( get_the_modified_date( '', $this->post ) )
		);

		$post_date = apply_filters( 'themeberger_post_date', $post_date, $this->post );
		$post_date = $args['before'] . $post_date . $args['after'];

		return $post_date;

	}

	public function get_human_post_date( $args = '' ) {

		$args = wp_parse_args(
			$args,
			array(
				'before' => '',
				'after'  => '',
			)
		);

		$posted_ago = human_time_diff( get_the_time( 'U', $this->post ), current_time( 'timestamp' ) );
		$posted_ago = sprintf(
			/* translators: %s = human-readable time difference */
			_x( '%s ago', '%s = human-readable time difference', 'themeberger-test' ),
			$posted_ago
		);
		$updated_ago = '';

		$date_string = '<time class="entry-date published updated dt-published dt-updated" itemprop="datePublished dateModified" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U', $this->post ) !== get_the_modified_time( 'U', $this->post ) ) {
			$date_string = '<time class="entry-date published dt-published" itemprop="datePublished" datetime="%1$s">%2$s</time><time class="updated dt-updated" itemprop="dateModified" datetime="%3$s">%4$s</time>';
			$updated_ago = human_time_diff( get_the_modified_time( 'U', $this->post ), current_time( 'timestamp' ) );
			$updated_ago = sprintf(
				/* translators: %s = human-readable time difference */
				_x( '%s ago', '%s = human-readable time difference', 'themeberger-test' ),
				$updated_ago
			);
		}
		$post_date = sprintf(
			$date_string,
			esc_attr( get_the_date( 'c', $this->post ) ),
			$posted_ago,
			esc_attr( get_the_modified_date( 'c', $this->post ) ),
			$updated_ago
		);

		$post_date = apply_filters( 'themeberger_human_post_date', $post_date, $this->post );
		$post_date = $args['before'] . $post_date . $args['after'];

		return $post_date;

	}

	public function get_permalink_date( $args = '' ) {

		$args = wp_parse_args(
			$args,
			array(
				'before'         => '',
				'after'          => '',
				'human_readable' => false,
			)
		);

		$permalink_title = sprintf(
			/* translators: 1 = Post Title, 2 = Author Name */
			esc_html_x( '%1$s by %2$s', 'permalink title', 'themeberger-test' ),
			get_the_title( $this->post ) ? get_the_title( $this->post ) : __( 'A post', 'themeberger-test' ),
			get_the_author_meta( 'display_name', $this->post->post_author )
		);

		$permalink_before = '<a href="%1$s" class="uid u-uid url u-url" title="%2$s" rel="bookmark">';
		$permalink_before = sprintf(
			$permalink_before,
			esc_url( get_permalink( $this->post ) ),
			$permalink_title
		);
		$permalink_after  = '</a>';

		if ( ! $args['human_readable'] ) {
			$permalink = $this->get_post_date(
				array(
					'before' => $permalink_before,
					'after'  => $permalink_after,
				)
			);
		} else {
			$permalink = $this->get_human_post_date(
				array(
					'before' => $permalink_before,
					'after'  => $permalink_after,
				)
			);
		}

		$permalink = apply_filters( 'themeberger_permalink_date', $permalink, $this->post );
		$permalink = $args['before'] . $permalink . $args['after'];

		return $permalink;

	}

	public function get_shorturl( $args = '' ) {

		$args = wp_parse_args(
			$args,
			array(
				'before' => '',
				'after'  => '',
			)
		);

		$shortlink_string  = '<a href="%1$s" class="u-shorturl u-shortlink shortlink" rel="shortlink" type="text/html">%2$s</a>';
		$shortlink_full    = wp_get_shortlink( $this->post_id );
		$shortlink_display = preg_replace( '(^https?://)', '', $shortlink_full );

		$shortlink = sprintf(
			$shortlink_string,
			$shortlink_full,
			$shortlink_display
		);

		$shortlink = apply_filters( 'themeberger_shortlink', $shortlink, $this->post );
		$shortlink = $args['before'] . $shortlink . $args['after'];

		return $shortlink;

	}

	public function get_first_image_of_post( $args = '' ) {

		$args = wp_parse_args(
			$args,
			array(
				'before' => '',
				'after'  => '',
			)
		);

		$content = do_shortcode( apply_filters( 'the_content', $this->post->post_content ) );
		$pattern = '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i';
		preg_match_all( $pattern, $content, $matches );

		$first_image = $matches[1][0];

		if ( empty( $first_image ) ) {
			return 'EMPTY IMAGE!!';
		}

		$first_image = '<img src="' . $first_image . '" class="photo u-photo" itemprop="image">';
		$image       = apply_filters( 'themeberger_first_image_of_post', $first_image, $this->post );
		$image       = $args['before'] . $image . $args['after'];

		return $image;

	}

	public function get_content_without_first_image() {

		$content = do_shortcode( apply_filters( 'the_content', $this->post->post_content ) );
		$content = preg_replace( '/<img[^>]+./', '', $content );
		$content = preg_replace( '/<figure[^>]*><\\/figure[^>]*>/', '', $content );

		return $content;

	}

	public function get_first_video_of_post( $args = '' ) {

		$args = wp_parse_args(
			$args,
			array(
				'before' => '',
				'after'  => '',
			)
		);

		$poster  = '';
		$content = do_shortcode( apply_filters( 'the_content', $this->post->post_content ) );
		$pattern = '/<video.+src=[\'"]([^\'"]+)[\'"].*>/i';
		preg_match_all( $pattern, $content, $matches );

		if ( ! empty( $matches ) && ! empty( $matches[1] ) ) {
			$first_video = $matches[1][0];
		}

		if ( empty( $first_video ) ) {
			$embed = get_media_embedded_in_content( $content, array( 'video', 'embed', 'iframe' ) );
			if ( empty( $embed ) ) {
				return 'EMPTY VIDEO!!';
			}
			$first_video = $embed[0];
		} else {
			$pattern_poster = '/<video.+poster=[\'"]([^\'"]+)[\'"].*>/i';
			preg_match_all( $pattern_poster, $content, $matches_poster );
			if ( ! empty( $matches_poster ) && ! empty( $matches_poster[1] ) ) {
				$poster = $matches_poster[1][0];
			}
			$first_video = explode( '?', $first_video )[0];
			$first_video = wp_video_shortcode(
				array(
					'src'    => $first_video,
					'poster' => $poster,
					'width'  => 900,
				)
			);
		}

		$video = apply_filters( 'themeberger_first_video_of_post', $first_video, $this->post );
		$video = $args['before'] . $video . $args['after'];

		return $video;

	}

	public function get_content_without_first_video() {

		$content = $this->post->post_content;
		$content = preg_replace( '/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i', '', $content );
		$content = preg_replace( '/\s*[a-zA-Z\/\/:\.]*vimeo.com\/([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i', '', $content );
		$content = preg_replace( '/\[video(.*?)\[\/video\]/i', '', $content );
		$content = preg_replace( '/<figure.+class=[\'"]wp-block-video[\'"].*>(.*?)<\/figure>/i', '', $content );
		$content = do_shortcode( apply_filters( 'the_content', $content ) );
		// TODO: YouTube???

		return $content;

	}

	public function get_first_audio_of_post( $args = '' ) {

		$args = wp_parse_args(
			$args,
			array(
				'before' => '',
				'after'  => '',
			)
		);

		$content = do_shortcode( apply_filters( 'the_content', $this->post->post_content ) );
		$pattern = '/<audio.+src=[\'"]([^\'"]+)[\'"].*>/i';
		preg_match_all( $pattern, $content, $matches );
		if ( ! empty( $matches ) && ! empty( $matches[0] ) ) {
			$first_audio = $matches[0][0];
		}

		if ( empty( $first_audio ) ) {
			return 'EMPTY AUDIO!!';
		} else {
			$first_audio = explode( '?', $first_audio )[0];
			$first_audio = wp_audio_shortcode( array( 'src' => $first_audio ) );
		}

		$audio = apply_filters( 'themeberger_first_audio_of_post', $first_audio, $this->post );
		$audio = $args['before'] . $audio . $args['after'];

		return $audio;

	}

	public function get_content_without_first_audio() {

		$content = $this->post->post_content;

		$content = preg_replace( '/\[audio(.*?)\[\/audio\]/i', '', $content );
		$content = do_shortcode( apply_filters( 'the_content', $content ) );

		return $content;
	}

	public function get_first_quote_of_post( $args = '' ) {

		$args = wp_parse_args(
			$args,
			array(
				'before' => '',
				'after'  => '',
			)
		);

		$content = do_shortcode( apply_filters( 'the_content', $this->post->post_content ) );
		$pattern = '#<blockquote[^>]*>([^<]+|<(?!/?blockquote)[^>]*>|(?R))+</blockquote>#i';
		preg_match_all( $pattern, $content, $matches );

		if ( ! empty( $matches ) && ! empty( $matches[0] ) ) {
			$first_quote = $matches[0][0];
		}
		if ( empty( $first_quote ) ) {
			return 'EMPTY AUDIO!!';
		}

		$cite    = '';
		$pattern = '#<cite[^>]*>([\s\S]+?)</cite>#i';
		preg_match_all( $pattern, $first_quote, $matches );
		if ( ! empty( $matches ) && ! empty( $matches[0] ) ) {
			$cite = $matches[0][0];
			$cite = '<footer>' . $cite . '</footer>';
		}
		$first_quote = preg_replace( $pattern, '', $first_quote );
		$pattern     = '#<p>([\s\S]+?)</p>#i';
		preg_match_all( $pattern, $first_quote, $matches );
		$paragraphs = implode( '', $matches[0] );

		$quote = '<blockquote class="themeberger-quote">' . $paragraphs . $cite . '</blockquote>';

		$quote = apply_filters( 'themeberger_first_audio_of_post', $quote, $this->post );
		$quote = $args['before'] . $quote . $args['after'];

		return $quote;

	}

	public function get_content_without_first_quote() {

		$content = $this->post->post_content;

		$content = do_shortcode( apply_filters( 'the_content', $content ) );
		$pattern = '#<blockquote[^>]*>([^<]+|<(?!/?blockquote)[^>]*>|(?R))+</blockquote>#i';
		$content = preg_replace( $pattern, '', $content );

		return $content;
	}

}
