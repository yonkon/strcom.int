<?php
/**
 * @package WordPress
 * @subpackage
 */
?>

<?php get_header(); ?>

<div id="main-content">

	<div id="bread" class="bred"><?php if(function_exists('bcn_display')) bcn_display();?></div>

        <?php while (have_posts()) : the_post(); 
        global $more;
	$more = 1; 
        ?>

		<div id="caption"><?php the_title(); ?></div><img src="http://str-complex.ru/images/arrows.png">
		<div id="block-header"></div><br>

		<?php the_content(); ?>
	<?php endwhile; ?>
	<br>
	</div>

	<?php get_footer(); ?>