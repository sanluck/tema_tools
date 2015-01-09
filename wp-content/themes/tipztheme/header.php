<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php if ( is_home() ) { ?><? bloginfo('name'); ?>&nbsp;<?php bloginfo('description'); } else { wp_title('&nbsp;'); ?>&nbsp;by&nbsp;<? bloginfo('name'); } ?></title> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
<link rel="shorcut icon" type="image/x-ico" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />

<?php wp_head(); ?>
</head> 
<body> 

<div id="bgcontain">


<!-- header START -->
<div class="header">
<div class="logo">
 <?php
	if ( get_option('ddthemes_header') == 'logo' ) 
	{ include (TEMPLATEPATH . "/logo-img.php");	}
	else
	{ include (TEMPLATEPATH . "/logo-txt.php"); }
  ?>
</div>
<div class="search">
  <form method="get" action="<?php bloginfo('url'); ?>/">
   <fieldset>
   <input type="text" value="<?php the_search_query(); ?>" name="s" /><button type="submit">OK</button>
   </fieldset>
  </form>
</div>


</div> 
<!-- header END -->



<!-- Menu START -->
<div class="menu">
 <ul>
   <li<?php if ( is_front_page() ) echo ' class="current_page_item"'; ?>><a href="<?php echo get_option('home'); ?>/"><span>Главная</span></a></li>
<?php $pages = wp_list_pages('sort_column=menu_order&title_li=&echo=0');
$pages = preg_replace('%<a ([^>]+)>%U','<a $1><span>', $pages);
$pages = str_replace('</a>','</span></a>', $pages);
echo $pages; ?>
  </ul>
</div>
<!-- Menu END -->


<!-- container START -->
<div class="container"> 