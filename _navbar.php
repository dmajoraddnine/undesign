<?php
/**
 * _navbar.php
 *
 * Template chunk - page-top navbar (top-level category list)
 * Displays the top-level categories.
 *
 * undesign theme by Matt Yetter (http://www.matt-yetter.com)
 * many thanks to the wordpress folks for their great documentation and examples
 */
$site_base_url = home_url();
$site_name     = get_bloginfo('name');

// get a list of post categories to display as nav links
$cats = get_categories();

// sort the categories into appropriate heirarchy
// @NOTE: assumes single layer of nesting!
$nav_tree  = array();
$children = array();
foreach ($cats as $cat) {
  if ($cat->parent === '0') {
    // top-level category
    $nav_tree[$cat->cat_ID] = array(
      'id'       => $cat->cat_ID,
      'name'     => $cat->name,
      'slug'     => $cat->slug,
      'nav_path' => '/' . $cat->slug . '/',
      'children' => array()
    );
  } else {
    // child category - save for second phase
    array_push($children, $cat);
  } // end else
} // end foreach

// now sort children into parent buckets
foreach ($children as $child) {
  $parent_item = $nav_tree[$child->parent];

  array_push(
    $parent_item['children'],
    array(
      'id'       => $child->cat_ID,
      'name'     => $child->name,
      'slug'     => $child->slug,
      'nav_path' => '/' . $parent_item['slug'] . '/' . $child->slug . '/'
    )
  );
} // end foreach

// see which page we're on so we can set the correct pill
$site_hostname  = $_SERVER['HTTP_HOST'];
$requested_page = $_SERVER['REQUEST_URI'];
$active_category = '';
foreach ($nav_tree as $parent_item) {
  if (stripos($requested_page, $parent_item['slug']) !== false) {
    // found this category's slug in the requested page
    $active_category = $parent_item['name'];
  }
}
$active_category = 'code';

// begin HTML output
?>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="navbar-centerfix">

      <a class="brand" id="site-title" href="<?= $site_base_url ?>" title="<?= $site_name ?>">
        <h1><?= $site_name ?></h1>
      </a>

      <ul id="header-nav-links" class="nav nav-pills"><?php
// now display HTML for categories
// @TODO: CONTEXT HIGHLIGHT CATEGORIES / ITEMS
foreach ($nav_tree as $nav_item) { ?>
        <li <?= ($active_category === $nav_item['name'] ? ' class="active"' : '') ?>>
          <a href="<?= $site_base_url . $nav_item['nav_path'] ?>">
            <?= $nav_item['name'] ?>
          </a>
        </li><?php
} ?>
      </ul>
    </div><?php // class="navbar-centerfix" ?>
  </div><?php // class="navbar-inner" ?>
</div><?php // class="navbar" ?>