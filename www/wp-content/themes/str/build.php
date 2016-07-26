<?php
/**
 * @package WordPress
 * @subpackage
 * Template Name: Строительство
 */
get_header();?>

<div id="main-content">
  <div id="bread" class="bred"><?php if(function_exists('bcn_display')) bcn_display();?></div>

  <div id="caption">Строительство</div><img src="http://str-complex.ru/images/arrows.png">
  <div id="block-header"></div>
  <?php
  the_post();
 the_content();

if(false) {
  ?>
  Строительная компания «Строй Комплекс» также оказывает весь спектр услуг по монтажу строительных конструкций и устройству монолитных бетонных конструкций, внутренней и внешней отделке зданий, осуществление строительства зданий и сооружений I и II уровней ответственности в соответствии с государственным стандартом.
  <h4>Компания выполняет следующие виды работ:</h4>
  <ul>
    <li>Монтаж строительных конструкций</li>
    <li>Бетонные работы любой сложности</li>
    <li>Устройство фундаментов и каркасов (нулевой цикл, перекрытия)</li>
    <li>Строительство зданий и сооружений</li>
    <li>Реконструкция зданий и сооружений</li>
    <li>Капитальный ремонт зданий и сооружений</li>
    <li>Отделка и косметический ремонт помещений</li>
    <li>Прокладка инженерных коммуникаций (системы электричества, телефонии, вентиляции, кондиционирования, пожарной
      безопасности)
    </li>
    <li>Земляные работы (котлованы, подготовка пятен под застройку)</li>
  </ul>
  <img id="img" src="http://str-complex.ru/images/img1.jpg" alt=""/>

  &nbsp;

  ООО «Строй Комплекс» изготавливает металлоконструкции любой сложности, для возведения различных сооружений (ангаров, ферм, складских и производственных помещений), а также отдельных элементов, необходимых для строительства. Предлагаем Вашему вниманию перечень выполняемых нами работ и предоставляемых услуг.
  <h4>Металлические конструкции для жилищного и производственного строительства:</h4>
  <ul>
    <li>Несущие балки, колонны, фермы, кессоны, консоли</li>
    <li>Ограждения (мостовые, балконные, лестничные, декоративные)</li>
    <li>Люки, решетки, заборы, ворота, козырьки</li>
    <li>Витрины, стеллажи, изготовление наружной рекламы</li>
    <li>Закладные детали</li>
    <li>Атриумы, мансарды, осветительные и локационные вышки, мачты, опоры освещения</li>
  </ul>
  <img id="img" src="http://str-complex.ru/images/img4.jpg" alt=""/>
  <h4>Быстровозводимые модульные здания</h4>
  <img id="img" src="http://str-complex.ru/images/img2.jpg" alt=""/>
  <ul>
    <li>Гаражи</li>
    <li>Ангары из сэндвич панелей</li>
    <li>Торговые павильоны</li>
    <li>Автосалоны</li>
    <li>Посты охраны</li>
  </ul>

  <?php
}
?>
  <div style="height: 40px;">&nbsp;</div>
<div id="caption">Объекты</div><img src="http://str-complex.ru/images/arrows.png">
<div id="block-header"></div>

<?php
$wp_query = new WP_Query();
$another = new WP_Query();
$all_wp_pages = $wp_query->query(array('post_type' => 'page', 'post_parent' => '29'));

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
