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
			$catargs = array(
				'title_li'				=> '',
				'use_desc_for_title'	=> '0',
			);
			wp_list_categories( $catargs );
		?>
	</ul>
	<ul id="contact">
		<h2>contact</h2>
		<?php
			//list all wordpress links in 'contact' category for use as contact links
			$linkOptions = array(
				'orderby'		=> 'link_id',
				'category_name'	=> 'contact'
			);
			$links = get_bookmarks( $linkOptions );
			foreach( $links as $link )
			{
				printf( '<li><a href="%s" title="%s" target="_blank">%s</a></li>', $link->link_url, $link->link_description, $link->link_name );
			}
		?>
	</ul>
	<div id="about">
		<h2>about</h2>
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
		<li>All content <a class="secret" href="#">&#169;</a> Matt Yetter</li>
	</ul>
	<div id="logininfo" style="display:none;">
		<?php
			if( !is_user_logged_in() )
			{
				wp_login_form();
			}
			else
			{
				wp_loginout( home_url() );
				echo " | ";
				wp_register('', '');
			}
		?>
	</div>
</div>