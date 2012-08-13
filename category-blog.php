<?php
/**
 * category-blog.php
 *
 * page displaying blog posts.  different from other categories because full text of post should be displayed
 * rather than just the excerpt
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
			<h2>blog</h2>
			<?php while( have_posts() ): //begin WP Loop
				the_post(); //initialize post to allow use of tag templates ?>
				<div class="postWrapper">
					<h3 id="post-<?php the_ID(); ?>">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						<?php edit_post_link( 'Edit Post', ' | ' ); //adds link to edit post if logged in ?>
					</h3>
					<div class="entry">
						<?php the_content( 'Read More' ); ?>
					</div>
					<p class="postmetadata">
						Posted in <?php the_category( ', ' ); ?>
						on <?php the_time('F jS, Y'); ?>
						<?php //maybe add this back later: <strong>|</strong> comments_popup_link( 'No Comments', '1 Comment', '% Comments' ); ?>
					</p>
					<!--
						<?php trackback_rdf(); ?>
					-->
				</div>
			<?php endwhile; //end WP Loop ?>
		</div>
		
		<div class="post-nav">
			<div class="alignleft"><?php previous_posts_link('&laquo; Newer'); ?></div>
			<div class="alignright"><?php next_posts_link('Older &raquo;',''); ?></div>
		</div>
		
	<?php else : ?>
		<h2 class="center">Not Found</h2>
		<p class="center">
			<?php _e( "Sorry, but you are looking for something that isn't here." ); ?>
		</p>
	<?php endif; ?>
</div>

<?php get_footer(); ?>