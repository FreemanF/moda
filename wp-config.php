<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */

define('DB_NAME', 'freeman4');


/** Имя пользователя MySQL */
define('DB_USER', 'grower');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'Qwe4rty7');

/** Имя сервера MySQL */
define('DB_HOST', 'mysql.zzz.com.ua');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

define ('WPLANG', 'ru_RU');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|pv%-A+LXLa?rs+D#jx:+Ui<?nn$m<jnBp|8/TZ8Sj/9OI^gzLHq,AnYUs7|I@uN');
define('SECURE_AUTH_KEY',  'h)wW@)tvY)WK<D4aT;c)t{LN7:F0?+WML$J-X9B%bcu!]d=InP9Yn+OGRLx)e(uO');
define('LOGGED_IN_KEY',    '7w#S.mfj:-hy+(L2sS~7$iW[yujY=?0?>l6(a/8=(p}5!7k%oF-<>uXL(b<3]:Nj');
define('NONCE_KEY',        '#n=:48c@-c/qU)o*!r/oKgdRKTe^.IPx4{3sA#3$mR/oWvG2DUCL, ]VHBfe G `');
define('AUTH_SALT',        '#A/&6U,@QPA.gGrbq( uvR<i(i+l**o!0~ebd/VVk.N@%NO::9sjmB=sca1X>Rir');
define('SECURE_AUTH_SALT', '4DyGB~6f8G@{UwafLBD,]h=8W%pbkH{x7daZMQ;6=u[%3#Gp$dt5fKj/nCWUD|Z`');
define('LOGGED_IN_SALT',   ' NU-K` 2ph0PS6oQ,+ERgwc|-&T[Z,@e?5O~TYkG3OJ2uOO8QTR=JdHRbp1~S*MZ');
define('NONCE_SALT',       'vN<Io1BhD;KcSSz|Ec2t=qy<a1fsBFN=>$^g+nMo{| _I@+|[Zn}YjPgoz/BF*q6');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';
//define('WP_CACHE', true); //Added by WP-Cache Manager

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define('SCRIPT_DEBUG', true);
define('WP_POST_REVISIONS', 3);
define('CONCATENATE_SCRIPTS', false);
ini_set('memory_limit', '256M');
define('WP_MEMORY_LIMIT', '256M');
/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
