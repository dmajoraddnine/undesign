<?php
/**
 * single.php
 *
 * Page displaying a single post.
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
  get_template_part('_loop');

  // If comments are open, load up the comment template.
  if (comments_open()) {
    comments_template();
  }
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