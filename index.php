<?php
/**
 * index.php
 *
 * Landing page of the site.
 * Displays most recent posts (from all categories, for now) in reverse chronological order.
 *
 * undesign theme by Matt Yetter (http://www.matt-yetter.com)
 * many thanks to the wordpress folks for their great documentation and examples
 */

// WP function - load page header
get_header();

// custom function - load navbar (top-level category list)
get_template_part('_navbar');
?>
<div class="row-fluid" id="content-row">
	<div id="main-col" class="span8" role="main"><?php
if (have_posts()) {
	// custom function - run the WP Loop (display post[s])
  get_template_part('_loop'); ?>
		<div class="post-nav">
			<h3 class="fl">
			  <?php next_posts_link('&laquo; Older Posts',''); ?>
			</h3>
			<h3 class="fr">
			  <?php previous_posts_link('Newer Posts &raquo;'); ?>
			</h3>
		</div><?php
} else { ?>
		<h2 class="center">Not Found</h2>
		<p class="center">
		  Sorry, but you're looking for something that isn't here.
		</p><?php
} // end check for posts ?>
	</div><?php

// WP function - load page sidebar
get_sidebar();

// WP function - load footer
get_footer(); ?>