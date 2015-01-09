
<div id="footer">
  <?php bloginfo('name'); ?><a href="http://wp-templates.ru/">wordpress шаблоны</a>.
<!-- <?php echo get_num_queries(); ?> запросов. <?php timer_stop(1); ?> секунд. -->
<?php wp_footer(); ?>
</div>

<div id="validate">
   	<span id="rss"><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Синдикация через RSS'); ?>"><?php _e('RSS'); ?></a> | <a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('Последнике комментарии ко всем записям через RSS'); ?>"><?php _e('Комментарии RSS'); ?></a></span>
</div> <!-- end of #wrap -->

</body>
</html>