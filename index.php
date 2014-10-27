<?php
/**
 * index.php
 *
 * Landing page of the site.
 * Displays most recent posts (from all categories) in reverse chronological order.
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
	while (have_posts()) { // begin WP Loop
		the_post(); // initialize post to allow use of tag templates
		$cats = get_the_category(); // returns array, but each post should only have a subcategory, not top-level (except blog)

		// ensure post is not in 'uncategorized' category
		if ($cats[0]->name != 'uncategorized') { ?>
			<div class="content-block postWrapper">
				<h3 id="post-<?php the_ID(); ?>">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
					  <?php the_title(); ?>
					</a>
					<?php edit_post_link( 'Edit Post', ' | ' ); //adds link to edit post if logged in ?>
				</h3>
				<p class="postmetadata">
					Posted in <?php the_category( ', ' ); ?>
					on <?php the_time('m/d/y'); ?>
					<?php //maybe add this back later: <strong>|</strong> comments_popup_link( 'No Comments', '1 Comment', '% Comments' ); ?>
				</p>
				<div class="entry">
					<?php the_content( 'Read More' ); ?>
				</div>

				<!--
					<?php trackback_rdf(); ?>
				-->
			</div><?php
		} // end check for uncategorized
	} //end WP Loop ?>

			<div class="post-nav">
				<div class="alignleft"><?php previous_posts_link('&laquo; Newer'); ?></div>
				<div class="alignright"><?php next_posts_link('Older &raquo;',''); ?></div>
			</div><?php
} else { ?>
			<h2 class="center">Not Found</h2>
			<p class="center">
				<?php _e( "Sorry, but you are looking for something that isn't here." ); ?>
			</p><?php
} // end check for posts ?>
	</div><?php

// WP function - load page sidebar
get_sidebar();

// WP function - load footer
get_footer(); ?>