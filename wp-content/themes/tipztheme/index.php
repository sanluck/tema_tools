<?php get_header(); ?>
<?php global $post; $myposts = get_posts('numberposts=1'); foreach($myposts as $post) : setup_postdata($post); ?>

<!--start of Main Post-->
<div class="mp">
<div class="mct"></div><div class="mcc">

<!--start of Post Data + Image -->
<div class="postdata">
<?php $postmeta = get_post_meta($post->ID, 'feature-image', true); if($postmeta != ""){ ?>
 <div class="postimg"> <?php echo $postmeta; ?> </div> 
<?php } ?>
<div class="post">
 <div class="p-head">
  <h1><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h1>
   <p class="p-date-cat"><?php the_time('j F Y') ?> | Категория: <?php the_category(', ') ?></p>
 </div>
<div class="p-con"><p><?php echo truncate($post->post_content,256); ?></p></div>
 <ul class="p-det">
  <li class="p-det-com"><?php comments_popup_link('Оставить комментарий', 'Комментарии (1)', 'Комментарии (%)'); ?></li>
  <li class="p-det-more"><a href="<?php the_permalink()?>">Читать полностью</a></li>
 </ul>
</div>
</div>
<!--End of Post Data + Image -->

<!--Start Syndicate -->
<div class="syn">
<h3>Подписка</h3>
 <ul>
  <li><a class="syn1" href="<?php bloginfo('rss2_url'); ?>">Подписаться на RSS-ленту записей</a></li>
  <li><a class="syn2" href="<?php bloginfo('comments_rss2_url'); ?>">Подписаться на RSS-ленту комментариев</a></li>
  <li><a class="syn3" href="#">Подписаться через E-mail</a></li>
  <li><a class="syn4" href="#">Следуй за мной в Твиттер</a></li>
 </ul>
</div>
<!--End Syndicate -->

</div><div class="mcb"></div>
</div>
<!--end of Main Post-->
<?php endforeach; ?>




<!--start side central-->
<div class="SC">

<!--start of col 1-->
<div class="co1">
 <div class="categories">
  <h2>Категории</h2>     
	<ul> 
	 <?php wp_list_categories('show_count=1&title_li='); ?> 
	</ul>   
 </div>
 <div class="links">
  <h2>Ссылки</h2>
    <ul>
     <?php get_links('-1', '<li>', '</li>', '', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
    </ul>
 </div>
 </div>
<!--end of col 1-->

<!--start of col 2-->
<div class="co2">     

<h2>Последние записи</h2>
<?php global $post; $myposts = get_posts('numberposts=5&offset=1'); foreach($myposts as $post) : setup_postdata($post); ?>
 <div class="post">
 <div class="p-head">
   <h3><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h3>
   <p class="p-date-cat"><?php the_time('j F Y') ?> | Категория: <?php the_category(', ') ?></p>
  </div>
 <div class="p-con">
 <p><?php echo truncate($post->post_content,256); ?></p>
 </div> 
 <ul class="p-det">   
  <li class="p-det-com"><?php comments_popup_link('Оставить комментарий', 'Комментарии (1)', 'Комментарии (%)'); ?></li>
  <li class="p-det-more"><a href="<?php the_permalink()?>">Далее</a></li>
 </ul>
</div>
<?php endforeach; ?>
<?php include("nav.php"); ?>
</div>
<!--end of col 2-->

<!--end of col 3-->
 <div class="co3">
  <h2>Комментарии</h2>
  <div class="latestcomments">
  <ul>
   <?php mdv_recent_comments(); ?>
  </ul> 
  </div>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
<?php endif; ?>  
 </div>
<!--end of col 3--> 


 </div>
<!--end SC-->

<?php if (function_exists('ddtheme')) { ?><?php ddtheme("tipztheme");  ?><?php } ?>
<?php get_footer(); ?>