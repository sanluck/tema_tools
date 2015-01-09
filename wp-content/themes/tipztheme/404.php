<?php get_header(); ?>
<!--Start Side Central (SC)-->
<div class="SC SCL">

<!--Start Side Left-->
<div class="SL">
<h1 class="title">Ошибка 404</h1>
<p style="color:#F30">Извините, запрашиваемая вами страница не найдена.</p>

<br />
<div class="p-con">
<h3>Возможная причина:</h3>
<ul>
  <li>Страница была перемещена или переименована.</li>
  <li>Страница была удалена.</li>
  <li>Ссылка введена с ошибкой.</li>
</ul>
<br />
<h3>Вы можете посетить следующие страницы:</h3>
<ul>
  <li><a href="/about/">О блоге <? bloginfo('name'); ?></a></li>
  <li><a href="/contact/">Сообщить о битой ссылке</a></li>
</ul>
</div>

</div>
<!--Start Side Right-->
<div class="SR">
 <?php include 'sidebar.php'; ?>
</div>
<!--End Side Right-->

</div>
<!--End Side Central (SC)-->

<?php get_footer(); ?>