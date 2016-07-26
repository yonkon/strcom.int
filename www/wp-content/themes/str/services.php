<?php
/**
 * @package WordPress
 * @subpackage
 * Template Name: Услуги
 */
?>

<?php get_header(); ?>

<div id="main-content">
	<div id="bread" class="bred"><?php if(function_exists('bcn_display')) bcn_display();?></div>

        <?php while (have_posts()) : the_post(); ?>
  	  <div id="caption"><?php the_title(); ?></div><img src="http://str-complex.ru/images/arrows.png">
	  <div id="block-header"></div><br>
	  <?php the_content(); ?>
	<?php endwhile; ?>

<?php 
	$wp_query = new WP_Query(	
			array('post_type' => 'page', 
				'post_parent' => '27', 
				'post__not_in' => array('174')
				)
			); 
			
	while($wp_query->have_posts()) : $wp_query->the_post(); 
	$more = 0; 

 	$image = get_post_meta($post->ID, 'thumbnail', $single = true);
	if($image !== '') {
		$img = wp_get_attachment_image_src($image, array(42,40));
		$img = '<img src="'.$img[0].'" width="200" height="178"/>';
	} else {
		$img = '<img src="http://str-complex.ru/images/no-image.png" alt="Изображение не было добавлено" />';
	}

?>
	<div id="block">
	<div id="block-header"><?php the_title(); ?></div>
	<table width=666 border=0>
	 <tr>
	  <td width="230px" valign="top"><?php echo $img;?></td>
	  <td valign="top">
		<div class="blue-text"><?php the_content('',FALSE,''); ?></div>
	  </td>
	 </tr>
	</table>
        </div>
<?php 
	endwhile;
?>	<br>
	</div>
	<?php get_footer(); ?>