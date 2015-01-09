<div id="sidebar">

<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>
            
    <h2><?php _e('Рубрики'); ?></h2>
    <ul>
		<?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
    </ul>
      
    <h2><?php _e('Архив'); ?></h2>
	<ul>
	 <?php wp_get_archives('type=monthly'); ?>
	</ul>
	
    <h2><?php _e('Flickr'); ?></h2>
	<div id="flickr">
        	<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=4&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=57602777@N00"></script>
    </div>
    
    <h2><?php _e('Ссылки'); ?></h2>
    <ul>
    	<?php wp_list_bookmarks('categorize=0&title_li=0&title_after=&title_before='); ?>		
    </ul>

	<h2><?php _e('Прочее'); ?></h2>
	<ul>
		<?php wp_register(); ?>
		<li><?php wp_loginout(); ?></li>
		<?php wp_meta(); ?>
	</ul>  	

<?php endif; ?>
    
    <?php include('ad_side.php'); ?>    
</div>