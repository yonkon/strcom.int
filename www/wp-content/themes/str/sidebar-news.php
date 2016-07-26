<?php
/**
 * @package WordPress
 * @subpackage str-complex
 */
?>

	<div id="main-sidebar">
		<div id="sidebar-header">Новости:</div>
<?php RssNewsDisplay(1); ?>
<?php 
  $wp_query = new WP_Query('post_type=page&post_parent=11'); 
  while($wp_query->have_posts()) : $wp_query->the_post(); 
  global $more;
  $more = 0;
?>
		<div id="nthread">
		  <?php the_title(); ?><br/><?php the_time('j F Y'); ?></div>
		  <p><?php the_content('',FALSE,''); ?></p><a class="snews" href="<?php the_permalink(); ?>">Читать полностью</a>
		
<?php 
	endwhile;
?>
	</div>