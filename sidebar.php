<?php
/**
 * sidebar.php
 *
 * contains nav links and contact information
 *
 * undesign theme by Matt Yetter (http://www.matt-yetter.com)
 * many thanks to the wordpress folks for their great documentation and examples
 */
?>
<div id="sidebar" class="span4">
	<ul id="nav">
		<a id="site-title" href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?>"><h1><?php bloginfo( 'name' ); ?></h1></a>
		<?php
			//list all wordpress post categories for use as nav links
			$categories = get_categories();
			foreach( $categories as $cat )
			{
				if( $cat != 'uncategorized' )
				{
					printf( '<li><a href="%s" title="%s | %s">%s</a></li>', get_category_link( $cat->term_id ), get_bloginfo( 'name' ), $cat->name, $cat->name );
				}
			}
		?>
	</ul>
	<ul id="contact">
		<h3>contact</h3>
		<?php
			//list all wordpress links in 'contact' category for use as contact links
			$linkOptions = array(
				'orderby'		=> 'link_id',
				'category_name'	=> 'contact'
			);
			$links = get_bookmarks( $linkOptions );
			foreach( $links as $link )
			{
				printf( '<li><a href="%s" title="%s">%s</a></li>', $link->link_url, $link->link_description, $link->link_name );
			}
		?>
	</ul>
	<div id="about">
		<h3>about</h3>
		<?php
			//print the content of the wordpress page titled 'about'
			$pages = get_pages();
			foreach( $pages as $page )
			{
				if( $page->post_title == 'about' )
				{
					printf( '<p>%s</p>', $page->post_content );
				}
			}
		?>
	</div>
	<ul id="siteinfo">
		<li>All content <a class="secret" href="wp-login.php">&#169;</a> Matt Yetter</li>
	</ul>
</div>