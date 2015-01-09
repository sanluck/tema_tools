<?php get_header(); ?>
<!--Start Side Central (SC)-->
<div class="SC">

<!--Start Side Left-->
<div class="SL">

<?php if (have_posts()) : ?>
<h1 class="title">Результаты поиска</h1>

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
<h1 class="title">Результаты поиска</h1>
<div class="p-con">
<p style="color:#F30">Извините, ничего не нашлось.  </p>
<h3>Советы: </h3>
<ul>    
  <li>Убедитесь, что вы правильно написали искомое слово.</li>
  <li>Попробуйте другое ключевое слово.</li>
  <li>Попробуйте расширить ваш запрос.</li>
</ul>
</div>
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