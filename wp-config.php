<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'WP_test' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'X#5{C**&Q,FQs-ul)]dIiG`YYd8~9[2:Jw&d9YH0D#}::sb)ou7yjiu4owKO]8TW' );
define( 'SECURE_AUTH_KEY',  '9rXYGo^//LZTqYC[a]bybN?g(HH_Utw:g$ZjL1E_X<NK7O%x,$KpwuAUCg25rEYA' );
define( 'LOGGED_IN_KEY',    'z^~|Ia&.6Kg+@jn.`-{eBz60>0Gr&aI:yA,IM!Hb$zfE6IjnyAMj9PYi*X`N&Kz@' );
define( 'NONCE_KEY',        '{pi&mXx{g3=lPO#[Xlp[_((E=O?&X9tJ-b&orP$Udy.TEn>~qH9#tbH5:G-M;Ck%' );
define( 'AUTH_SALT',        'SX6 >f/Uf[>0TCY}j1VPwS1w^BLIfVFBBeWm0V`}&&Png:BMYi}7`>5bVu.Z)UM5' );
define( 'SECURE_AUTH_SALT', 'XHDUs=VNbLq-zw=p{a:YnmRO1L^|,=xhh(5&.6=M~9zk=:NO&1k*PaEh_eWE]NF5' );
define( 'LOGGED_IN_SALT',   '3g#SSU{yRDfz)rSmwee[P5M7%SNZOOkpV?S<)TOsf-p*J_XD`r;UY0AXjV9V]J/N' );
define( 'NONCE_SALT',       'xrcCZRGFO0jrzY`ur-ACit)T#,B:)!>+Zw#K<kU91{Wmg#R+{/0 n{$glFv|e9Kq' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
