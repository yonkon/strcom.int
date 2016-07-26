<?php
/**
 * @package WordPress
 * @subpackage
 * Template Name: Производство
 */
?>

<?php get_header(); ?>

<div id="main-content">
	<div id="bread" class="bred"><?php if(function_exists('bcn_display')) bcn_display();?></div>

  	  <div id="caption">Объекты</div><img src="http://str-complex.ru/images/arrows.png">
	  <div id="block-header"></div>

<?php 
	$wp_query = new WP_Query(); 
	$another = new WP_Query(); 
	$all_wp_pages = $wp_query->query(array('post_type' => 'page', 'post_parent' => '25'));
	the_content();
	while($wp_query->have_posts()) : $wp_query->the_post(); 
  	  global $more;
	  $more = 0; 
	  $aa = $another->query(array('post_type' => 'page', 'post_parent' => $post->ID));	  
?>
	<div id="block">
	  <div id="block-header"><?php the_title(); ?></div>
	  <p><?php the_content('',FALSE,''); ?></p>
<?php
	$imgs = bdw_get_images($aa[0]->ID);
	$all_link = get_permalink($aa[0]->ID);
	$count = 0;
	foreach($imgs as $img) {
           echo '<a href="'.$img['large'].'" rel="lightbox"><img src="'.$img['small'].'"></a>&nbsp';
           $count++;
	}
?><br>
	
	  <a id="ss1" href="<?php echo $all_link; ?>">Все фотографии</a> 
	</div>

<?php 
	endwhile;
?>	<br>
	</div>
	<?php get_footer(); ?>