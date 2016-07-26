<?php
/**
 * @package WordPress
 * @subpackage
 * Template Name: Новости
 */
?>

<?php get_header(); ?>

<div id="main-content">
	<div id="bread" class="bred"><?php if(function_exists('bcn_display')) bcn_display();?></div>
	<div id="caption">Новости</div><img src="http://str-complex.ru/images/arrows.png">
	<div id="block-header"></div>
<?php 
	$wp_query = new WP_Query('post_type=page&post_parent=11'); 
	while($wp_query->have_posts()) : $wp_query->the_post(); 
	$more = 0; 
?>
	<div class="nthread">
	  <h2><?php the_title(); ?></h2>
	  <?php the_content('',FALSE,''); ?>
   	  <span class="date"><?php the_time('j F Y'); ?></span><br>
	  <a href="<?php the_permalink(); ?>">Читать полностью</a>
	 </div>
<?php 
	endwhile;
?>	<br>
	</div>
	<?php get_footer(); ?>