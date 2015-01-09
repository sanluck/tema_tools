<?php get_header(); ?>
<!--Start Side Central (SC)-->
<div class="SC">

<!--Start Side Left-->
<div class="SL">

<?php if (have_posts()) : ?>
<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>
<h2 class="title">Архив категории &#8216;<strong><?php single_cat_title(); ?></strong>&#8217; </h2>
<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
<h2 class="title">Записи с метками &#8216;<strong><?php single_tag_title(); ?></strong>&#8217;</h2>
<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
<h2 class="title">Архив за <strong><?php the_time('j F Y'); ?></strong></h2>
<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<h2 class="title">Архив за <strong><?php the_time('F, Y'); ?></strong></h2>
<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<h2 class="title">Архив за <strong><?php the_time('Y'); ?></strong></h2>
<?php /* If this is an author archive */ } elseif (is_author()) { ?>
<h2 class="title">Архив автора</h2>
<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<h2 class="title">Архив блога</h2>
<?php } ?>

<?php while (have_posts()) : the_post(); ?>
 <div class="post" style="padding: 20px 0px;">
 <div class="p-head">
    <h3><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h3>
   <p class="p-date-cat"><?php the_time('j F Y') ?> | Категория: <?php the_category(', ') ?></p>
  </div>
 <div class="p-con">
 <p><?php echo truncate($post->post_content,256); ?></p>
 </div>
 <ul class="p-det">   
 <li class="p-det-com"><?php comments_popup_link('Комментарии (0)', 'Комментарии <strong>(1)</strong>', 'Комментарии <strong>(%)</strong>'); ?></li>
 <li class="p-det-more"><a href="<?php the_permalink()?>">Далее</a></li>
 <?php if (function_exists('the_tags')) { ?> <?php the_tags('<li class="p-det-tags">Метки: ', ', ', '</li>'); ?> <?php } ?>
</ul>
</div>
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
</ul><?php endif; ?>
</div>
<!--Start Side Right-->
<div class="SR">
 <?php include 'sidebar.php'; ?>
</div>
<!--End Side Right-->

</div>
<!--End Side Central (SC)-->

<?php get_footer(); ?>