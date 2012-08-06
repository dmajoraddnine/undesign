<?php
/**
 * index.php
 *
 * main page of the site.  grabs relevant template files and runs the wordpress loop.
 *
 * undesign theme by Matt Yetter (http://www.matt-yetter.com)
 * many thanks to the wordpress folks for their great documentation and examples
 */
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="content" class="span8" role="main">
	<?php if( have_posts() ):
		while( have_posts() ): //begin WP Loop
			the_post(); //initialize post to allow use of tag templates
			if( get_the_category() != 'uncategorized' ): ?>
				<h2 id="post-<?php the_ID(); ?>">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h2>
				<div class="entry">
					<?php the_content( 'Read More' ); ?>
				</div>
				<p class="postmetadata">
					Posted in <?php the_category( ', ' ) ?>
					on <?php the_time('F jS, Y') ?>
					<strong>|</strong>
					<?php edit_post_link( 'Edit',' ','<strong> | </strong>' ); ?>  
					<?php comments_popup_link( 'No Comments', '1 Comment', '% Comments' ); ?>
				</p>
				<!--
					<?php trackback_rdf(); ?>
				-->
			<?php endif; ?>
		<?php endwhile; //end WP Loop ?>
		
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