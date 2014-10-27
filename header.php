<?php
/**
 * header.php
 *
 * contains <head> tag and meta information
 *
 * undesign theme by Matt Yetter (http://www.matt-yetter.com)
 * many thanks to the wordpress folks for their great documentation and examples
 */
?><!DOCTYPE html >
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
	<head>
		<!-- meta info -->
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

		<?php
			/**
			* We add some JavaScript to pages with the comment form
			* to support sites with threaded comments (when in use).
			*/
			if(is_singular() && get_option('thread_comments')) {
				wp_enqueue_script('comment-reply');
			}

			wp_head(); // head hook for plugins
		?>
		<script type="text/javascript">
			document.domain = "<?= $_SERVER['HTTP_HOST']; ?>"; // to allow iframe manipulations
		</script>
	</head>

	<body <?php body_class(); ?>> <?php // closed in footer ?>
		<div class="container-fluid"> <?php // closed in footer ?>
