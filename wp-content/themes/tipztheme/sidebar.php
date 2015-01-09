<div class="SRL" style="width: 180px; float: left;">
<div class="widget widget_categories">
  <h2>Категории</h2>     
	<ul> 
	 <?php wp_list_categories('show_count=1&title_li='); ?> 
	</ul>   
</div><div class="widget">
<h2>Архивы</h2>
  <ul>
  <?php wp_get_archives('type=monthly'); ?>
 </ul>
</div><div class="widget widget_links">
  <h2>Ссылки</h2>
    <ul>
     <?php get_links('-1', '<li>', '</li>', '', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
    </ul>
</div></div>
<div class="SRR" style="width: 250px; float: left; margin-left: 20px;">
  <div class="widget widget_recent_comments">
  <h2>Комментарии</h2>
  <ul>
   <?php mdv_recent_comments(); ?>
  </ul> 
  </div>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?><?php endif; ?>
</div>