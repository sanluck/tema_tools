<?php get_header(); ?>
<!--Start Side Central (SC)-->
<div class="SC">

<!--Start Side Left-->
<div class="SL">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<!--Start Post-->
<div class="post">
 <div class="p-head">
   <h1><?php the_title(); ?></h1>
   <p class="p-date-cat"><?php the_time('j F Y') ?> | Категория: <?php the_category(', ') ?></p>
</div>
  <div class="p-con">
  <?php the_content('Читать полностью &raquo;'); ?>  
</div>
<?php if (function_exists('the_tags')) { ?> <?php the_tags('<ul class="p-det"><li class="p-det-tags">Метки: ', ', ', '</li></ul>'); ?> <?php } ?>
</div>
<!--End Post-->
<?php comments_template(); ?>	
<?php endwhile; ?>
<?php include("nav.php"); ?>
<?php else : ?>
<h1 class="title">Ошибка 404</h1>
<p style="color:#F30">Извините, запрашиваемая вами страница не найдена.</p>

<br />
<div class="p-con">
<h3>Возможная причина:</h3>
<ul>
  <li>Страница была перемещена или переименована.</li>
  <li>Страница была удалена.</li>
  <li>Ссылка введена с ошибкой.</li>
</ul>
<br />
<h3>Вы можете посетить следующие страницы:</h3>
<ul>
  <li><a href="/about/">О блоге <? bloginfo('name'); ?></a></li>
  <li><a href="/contact/">Сообщить о битой ссылке</a></li>
</ul>
<?php endif; ?>
</div>
<!--Start Side Right-->
<div class="SR">
 <?php include 'sidebar.php'; ?>
</div>
<!--End Side Right-->

</div>
<!--End Side Central (SC)-->

<?php get_footer(); ?>