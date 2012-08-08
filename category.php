<?php
/**
 * category.php
 *
 * page displaying all posts in a single category. displays as a list of links to individual posts.
 *
 * undesign theme by Matt Yetter (http://www.matt-yetter.com)
 * many thanks to the wordpress folks for their great documentation and examples
 */
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="content" class="span8" role="main">
	<?php if( have_posts() ): ?>
		<div id="postlist">
			<h2><?php single_cat_title(); //display main category title ?></h2>
			<?php while( have_posts() ): //begin WP Loop
				the_post(); //initialize post to allow use of tag templates
				$cats = get_the_category(); //returns array, but each post should only have a subcategory, not top-level (except blog)
				if( $cats[0]->name != 'uncategorized' ): ?>
					<div class="row">
						<div class="span2">
							<h3 id="post-<?php the_ID(); ?>">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></br>
								<?php edit_post_link( 'Edit Post' ); //adds link to edit post if logged in ?>
							</h3>
						</div>
						<div class="span6 post-excerpt">
							<?php the_excerpt(); ?>
						</div>
					</div>
					<?php if( comments_open() ): //check if comments are allowed on this post ?>
						<div class="row">
							<div class="span8">
								<p class="postmetadata">
									Posted in <?php the_category( ', ' ) ?>
									on <?php the_time('F jS, Y') ?>
									<strong>|</strong>
									<?php comments_popup_link( 'No Comments', '1 Comment', '% Comments' ); ?>
								</p>
								<!--
									<?php trackback_rdf(); ?>
								-->
							</div>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			<?php endwhile; //end WP Loop ?>
		</div>
		
		<div class="post-nav">
			<div class="alignright"><?php next_posts_link('Newer &raquo;','') ?></div>
			<div class="alignleft"><?php previous_posts_link('&laquo; Older') ?></div>
		</div>
		
	<?php else : ?>
		<h2 class="center">Not Found</h2>
		<p class="center">
			<?php _e( "Sorry, but you are looking for something that isn't here." ); ?>
		</p>
	<?php endif; ?>
</div>

<?php get_footer(); ?>