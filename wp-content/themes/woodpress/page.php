<?php get_header(); ?>
<div id="content">
	<?php if (have_posts()) :?>
		<?php $postCount=0; ?>
		<?php while (have_posts()) : the_post();?>
			<?php $postCount++;?>
	<div class="entry entry-<?php echo $postCount ;?>">
		<div class="entrytitle">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка <?php the_title(); ?>"><?php the_title(); ?></a></h2> 
			<!-- Dont need date on pages
            <h3><?php the_time('d M Y') ?></h3>
            -->
		</div>
		<div class="entrybody">
			<?php the_content('Читать полностью &raquo;'); ?>
		</div>
		
		<!-- Remove this for page layout
        <div class="entrymeta">
		<div class="postinfo">
			<span class="postedby">Автор: <?php the_author() ?></span>
			<span class="filedto">Рубрика: <?php the_category(', ') ?> </span>
			<?php comments_popup_link('Ваш отзыв &#187;', '1 отзыв &#187;', 'Отзывов: % &#187;', 'commentslink'); ?>            
		</div>
		</div>
        -->
        
		<?php edit_post_link('Править', ' | ', ''); ?>
	</div>
    
    <!-- Remove this for page layout
	<div class="commentsblock">
		<?php //comments_template(); ?>
	</div>
    -->
	
	<?php endwhile; ?>
		<!-- <div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Предыдущая страница') ?></div>
			<div class="alignright"><?php previous_posts_link('Следующая страница &raquo;') ?></div>
		</div>
		 -->
		
	<?php else : ?>

		<h2>Не найдено</h2>
		<div class="entrybody">К сожалению, по вашему запросу ничего не найдено.</div>

	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>