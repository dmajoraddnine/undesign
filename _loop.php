<?php
/**
 * _loop.php
 *
 * Template chunk - Wordpress Loop
 * Gets and displays a series of (or single) post(s).
 *
 * undesign theme by Matt Yetter (http://www.matt-yetter.com)
 * many thanks to the wordpress folks for their great documentation and examples
 */
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
                <?php edit_post_link('Edit Post', ' | '); //adds link to edit post if logged in ?>
            </h3>
            <p class="postmetadata">
                Posted in <?php the_category( ', ' ); ?> on <?php the_time('m/d/y'); ?>
            </p>
            <div class="entry">
                <?php the_content('Continue reading <span class="meta-nav">&rarr;</span>'); ?>
            </div><?php

      if (!post_password_required() && (comments_open() || get_comments_number())) { ?>
            <p class="comments-link">
              <?php comments_popup_link( 'Leave A Comment', '1 Comment', '% Comments' ); ?>
            </p><?php
      }
      // @TODO: add tag list?
      /*
      the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' );
      */
      ?>
            <!--
                <?php trackback_rdf(); ?>
            -->
        </div><?php
    } // end check for uncategorized
} //end WP Loop ?>