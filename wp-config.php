<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи и ABSPATH. Дополнительную информацию можно найти на странице
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется скриптом для создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения вручную.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'tema_tools');

/** Имя пользователя MySQL */
define('DB_USER', 'tema');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'mX38p6wLU5NWXfm8');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */

 define('AUTH_KEY',         'u|Y]]P|M~/ANEeY()q;lUNNKMJzy]Kryr 0wm*yEe*,;m,S|FCS@}mLaL3/qhxJ6');
define('SECURE_AUTH_KEY',  ',7_&k 57FQCB:^K!:?h3MeH:*@j+ZM}IUq-NhF(.W%5Z%CuN,#-y>=g: FcjB<#4');
define('LOGGED_IN_KEY',    '+8./zi|pq|v^~zEYw>M!pmp0gE 2X&X7f>+]EpPw-=%312o%|-=/U+e|+OWBR6Rh');
define('NONCE_KEY',        'J}gj+f`g}HO3rz1}NWz*.U0$9Lg6X|:mi_N|n ._e2*:B31B:L{-B-_&@}MD@s0w');
define('AUTH_SALT',        'd{RD[UD@X!>1GB1R4F>k-%|H;#G<WL5;hG_jXm4?/kd/tPyO<|!Px[Sd=cE [!>9');
define('SECURE_AUTH_SALT', 'qF.ktm:(rFtmkzA;Y6V-jT|n$?`@=G|3qqmf.5C6X/:{!T/|[y#I9Me#cTs<DNmA');
define('LOGGED_IN_SALT',   '2u[POTe77^SMeiwtj. py(E+w-I|Xv1-PCAaX5FdzMj{[&=cDe5QnWUFszNjf{5k');
define('NONCE_SALT',       't{#T[R:Q-L@A8)~HOjOgfPb>-^f-2yfZb9.hrUi2 O=^8,Nw5}l?n[G;hmkC#N_<');
 
/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
