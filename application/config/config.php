<?php
/*-------------------------------------------------------
*
*   LiveStreet Engine Social Networking
*   Copyright © 2008 Mzhelskiy Maxim
*
*--------------------------------------------------------
*
*   Official site: www.livestreet.ru
*   Contact e-mail: rus.engine@gmail.com
*
*   GNU General Public License, version 2:
*   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*
---------------------------------------------------------
*/

/**
 * !!!!! ВНИМАНИЕ !!!!!
 *
 * Ничего не изменяйте в этом файле!
 * Все изменения нужно вносить в файл config/config.local.php
 */
define('LS_VERSION', '3.0.0');

/**
 * Основные настройки путей
 * Если необходимо установить движек в директорию(не корень сайта) то следует сделать так:
 * $config['path']['root']['web']    = 'http://'.$_SERVER['HTTP_HOST'].'/subdir';
 * и увеличить значение $config['path']['offset_request_url'] на число вложенных директорий,
 * например, для директории первой вложенности www.site.ru/livestreet/ поставить значение равное 1
 */
$config['path']['root']['server'] = dirname(dirname(dirname(__FILE__)));
$config['path']['root']['web'] = isset($_SERVER['HTTP_HOST']) ? 'http://' . $_SERVER['HTTP_HOST'] : null;
$config['path']['offset_request_url'] = 0;


/**
 * Настройки HTML вида
 */
$config['view']['skin'] = 'synio';        // Название текущего шаблона
$config['view']['theme'] = 'default';            // тема оформления шаблона (шаблон должен поддерживать темы)
$config['view']['rtl'] = false;
$config['view']['name'] = 'Мой сайт';                   // название сайта
$config['view']['description'] = 'Описание сайта'; // seo description
$config['view']['keywords'] = 'site, google, internet';      // seo keywords
$config['view']['wysiwyg'] = false;  // использовать или нет визуальный редактор TinyMCE
$config['view']['noindex'] = true;   // "прятать" или нет ссылки от поисковиков, оборачивая их в тег <noindex> и добавляя rel="nofollow"
$config['view']['img_resize_width'] = 570;    // до какого размера в пикселях ужимать картинку по щирине при загрузки её в топики и комменты
$config['view']['img_max_width'] = 5000;    // максимальная ширина загружаемых изображений в пикселях
$config['view']['img_max_height'] = 5000;    // максимальная высота загружаемых изображений в пикселях
$config['view']['img_max_size_url'] = 500;    // максимальный размер картинки в kB для загрузки по URL

/**
 * Настройки СЕО для вывода топиков
 */
$config['seo']['description_words_count'] = 20;               // количество слов из топика для вывода в метатег description


/**
 * Общие настройки
 */
$config['general']['close'] = false; // использовать закрытый режим работы сайта, сайт будет доступен только авторизованным пользователям
$config['general']['close_exceptions'] = array(
    'auth',
    'ajax' => array('captcha'),
); // список action/avent для исключения при закрытом режиме
$config['general']['rss_editor_mail'] = '___sys.mail.from_email___'; // мыло редактора РСС
$config['general']['reg']['invite'] = false; // использовать режим регистрации по приглашению или нет. Если использовать, то регистрация будет доступна ТОЛЬКО по приглашениям!
$config['general']['reg']['activation'] = false; // использовать активацию при регистрации или нет
$config['general']['login']['captcha'] = false; // использовать каптчу при входе или нет
$config['general']['admin_mail'] = 'admin@admin.adm'; // email администратора
/**
 * Настройка каптчи
 */
$config['sys']['captcha']['type'] = 'kcaptcha'; // тип используемой каптчи: kcaptcha, recaptcha
/**
 * Настройки кеширования
 */
$config['sys']['cache']['use'] = false;               // использовать кеширование или нет
$config['sys']['cache']['type'] = 'file';             // тип кеширования: file, xcache и memory. memory использует мемкеш, xcache - использует XCache


/**
 * Настройки модулей
 */

// Модуль Topic
$config['module']['topic']['new_time'] = 60 * 60 * 24 * 1;  // Время в секундах в течении которого топик считается новым
$config['module']['topic']['per_page'] = 10;          // Число топиков на одну страницу
$config['module']['topic']['max_length'] = 15000;       // Максимальное количество символов в одном топике
$config['module']['topic']['min_length'] = 2;       // Минимальное количество символов в одном топике
$config['module']['topic']['allow_empty'] = false;       // Разрешать или нет не заполнять текст топика
$config['module']['topic']['title_max_length'] = 200;       // Максимальное количество символов в заголовке топика
$config['module']['topic']['title_min_length'] = 2;       // Минимальное количество символов в заголовке топика
$config['module']['topic']['title_allow_empty'] = false;       // Разрешать или нет не заполнять заголовок топика
$config['module']['topic']['tags_allow_empty'] = false; // Разрешать или нет не заполнять теги
$config['module']['topic']['tags_count_min'] = 1; // Минимальное количество тегов
$config['module']['topic']['tags_count_max'] = 15; // Максимальное количество тегов
$config['module']['topic']['default_period_top'] = 1; // Дефолтный период (количество дней) для отображения ТОП топиков. Значения: 1,7,30,'all'
$config['module']['topic']['default_period_discussed'] = 1; // Дефолтный период (количество дней) для отображения обсуждаемых топиков. Значения: 1,7,30,'all'
$config['module']['topic']['max_blog_count'] = 3; // Количество блогов, которые можно задать топику. Максимальное значение 5.
$config['module']['topic']['max_rss_count'] = 20; // Максимальное количество топиков в RSS потоке
$config['module']['topic']['default_preview_size'] = '900x300crop'; // Дефолтный размер превью для топика (все размеры задаются в конфиге media), который будет использоваться, например, для Open Graph
/**
 * Настройка ЧПУ URL топиков
 * Допустимы шаблоны:
 * %year% - год топика (2010)
 * %month% - месяц (08)
 * %day% - день (24)
 * %hour% - час (17)
 * %minute% - минуты (06)
 * %second% - секунды (54)
 * %login% - логин автора топика (admin)
 * %blog% - url основного блога (report), если топик без блога, то этот параметр заменится на логин автора топика
 * %id% - id топика (325)
 * %title% - заголовок топика в транслите (moy_topic)
 * %type% - тип топика (news)
 *
 * В шаблоне обязательно должен быть %id% или %title%, это необходимо для точной идентификации топика
 */
$config['module']['topic']['url'] = '%year%/%month%/%day%/%title%.html';
/**
 * Список регулярных выражений для частей URL топика
 * Без необходимых навыков лучше этот параметр не менять
 */
$config['module']['topic']['url_preg'] = array(
    '%year%' => '\d{4}',
    '%month%' => '\d{2}',
    '%day%' => '\d{2}',
    '%hour%' => '\d{2}',
    '%minute%' => '\d{2}',
    '%second%' => '\d{2}',
    '%login%' => '[\w\-\_]+',
    '%blog%' => '[\w\-\_]+',
    '%id%' => '\d+',
    '%title%' => '[\w\-\_]+',
    '%type%' => '[\w\-\_]+',
);


// Модуль User
$config['module']['user']['per_page'] = 15;          // Число юзеров на страницу на странице статистики и в профиле пользователя
$config['module']['user']['friend_on_profile'] = 15;          // Ограничение на вывод числа друзей пользователя на странице его профиля
$config['module']['user']['friend_notice']['delete'] = false; // Отправить talk-сообщение в случае удаления пользователя из друзей
$config['module']['user']['friend_notice']['accept'] = false; // Отправить talk-сообщение в случае одобрения заявки на добавление в друзья
$config['module']['user']['friend_notice']['reject'] = false; // Отправить talk-сообщение в случае отклонения заявки на добавление в друзья
$config['module']['user']['avatar_size'] = array(
    '100crop',
    '64crop',
    '48crop',
    '24crop'
); // Список размеров аватаров у пользователя
$config['module']['user']['login']['min_size'] = 3; // Минимальное количество символов в логине
$config['module']['user']['login']['max_size'] = 30; // Максимальное количество символов в логине
$config['module']['user']['login']['charset'] = '0-9a-z_\-'; // Допустимые в имени пользователя символы
$config['module']['user']['time_active'] = 60 * 60 * 24 * 7;    // Число секунд с момента последнего посещения пользователем сайта, в течение которых он считается активным
$config['module']['user']['time_onlive'] = 60 * 10;    // Число секунд с момента последнего посещения пользователем сайта, в течение которых он считается "онлайн"
$config['module']['user']['time_login_remember'] = 60 * 60 * 24 * 7;   // время жизни куки когда пользователь остается залогиненым на сайте, 7 дней
$config['module']['user']['usernote_text_max'] = 250;        // Максимальный размер заметки о пользователе
$config['module']['user']['usernote_per_page'] = 20;          // Число заметок на одну страницу
$config['module']['user']['userfield_max_identical'] = 2;    // Максимальное число контактов одного типа
$config['module']['user']['profile_photo_size'] = '370x';      // размер фото в профиле пользователя, формат вида: WxH[crop]
$config['module']['user']['name_max'] = 30;              // максимальная длинна имени в профиле пользователя
$config['module']['user']['captcha_use_registration'] = true;  // проверять поле капчи при регистрации пользователя
$config['module']['user']['complaint_captcha'] = true;  // Использовать или нет каптчу при написании жалобы
$config['module']['user']['complaint_notify_by_mail'] = true;  // Уведомлять администратора на емайл о поступлении новой жалобы
$config['module']['user']['complaint_text_required'] = true;  // Обязательно указывать текст при жалобе
$config['module']['user']['complaint_text_max'] = 2000;  // Максимальный размер текста жалобы
$config['module']['user']['complaint_type'] = array(    // Список типов жалоб на пользователя
    'spam',
    'obscene',
    'other'
);
$config['module']['user']['rbac_role_default'] = 'user'; // Роль, которая автоматически назначается пользователю при регистрации
$config['module']['user']['count_auth_session'] = 4; // Количество разрешенных сессий пользователя (авторизаций в разных браузерах)
$config['module']['user']['count_auth_session_history'] = 10; // Общее количество сессий для хранения (значение должно быть больше чем count_auth_session)

// Модуль Lang
$config['module']['lang']['delete_undefined'] = true;   // Если установлена true, то модуль будет автоматически удалять из языковых конструкций переменные вида %%var%%, по которым не была произведена замена
// Модуль Notify
$config['module']['notify']['delayed'] = false;    // Указывает на необходимость использовать режим отложенной рассылки сообщений на email
$config['module']['notify']['insert_single'] = false;    // Если опция установлена в true, систему будет собирать записи заданий удаленной публикации, для вставки их в базу единым INSERT
$config['module']['notify']['per_process'] = 10;       // Количество отложенных заданий, обрабатываемых одним крон-процессом
$config['module']['notify']['dir'] = 'emails'; // Путь до папки с емэйлами относительно шаблона
$config['module']['notify']['prefix'] = 'email';  // Префикс шаблонов емэйлов

// Модуль Security
$config['module']['security']['hash'] = "livestreet_security_key"; // "примесь" к строке, хешируемой в качестве security-кода


/**
 * Модуль Image
 */
$config['module']['image']['params']['blog_avatar']['size_max_width'] = 1000;
$config['module']['image']['params']['blog_avatar']['size_max_height'] = 1000;
/**
 * Модуль Media
 */
$config['module']['media']['max_size'] = 3*1024; // Максимальный размер файла в kB
$config['module']['media']['max_count_files'] = 30; // Максимальное количество файлов медиа у одного объекта
$config['module']['media']['image']['max_size'] = 5*1024; // Максимальный размер файла изображения в kB
$config['module']['media']['image']['autoresize'] = true; // Разрешает автоматическое создание изображений нужного размера при их запросе
$config['module']['media']['image']['original'] = '1500x'; // Размер для хранения оригинала. Если true, то будет сохраняться исходный оригинал без ресайза. Если false, то оригинал сохраняться не будет
$config['module']['media']['image']['sizes'] = array(  // список размеров, которые необходимо делать при загрузке изображения
    array(
        'w'    => 1000,
        'h'    => null,
        'crop' => false,
    ),
    array(
        'w'    => 500,
        'h'    => null,
        'crop' => false,
    ),
    array(
        'w'    => 100,
        'h'    => 100,
        'crop' => true,
    ),
    array(
        'w'    => 50,
        'h'    => 50,
        'crop' => true,
    )
);
$config['module']['media']['image']['preview']['sizes'] = array(  // список размеров, которые необходимо делать при создании превью
    array(
        'w'    => 900,
        'h'    => 300,
        'crop' => true,
    ),
    array(
        'w'    => 250,
        'h'    => 150,
        'crop' => true,
    ),
);
/**
 * Модуль Validate
 */
// Настройки Google рекаптчи - https://www.google.com/recaptcha/admin#createsite
$config['module']['validate']['recaptcha']= array(
    'site_key' => '', // Ключ
    'secret_key' => '', // Секретный ключ
    'use_ip' => false, // Использовать при валидации IP адрес клиента
);
/**
 *  Модель Component
 */
$config['module']['component']['cache_tree'] = true; // кешировать или нет построение дерева компонентов
$config['module']['component']['cache_data'] = true; // кешировать или нет данные компонентов


// Какие модули должны быть загружены на старте
$config['module']['autoLoad'] = array('Hook', 'Cache', 'Logger', 'Security', 'Session', 'Lang', 'Message', 'User');
/**
 * Настройка базы данных
 */
$config['db']['params']['host'] = 'localhost';
$config['db']['params']['port'] = '3306';
$config['db']['params']['user'] = 'root';
$config['db']['params']['pass'] = '';
$config['db']['params']['type'] = 'mysqli';
$config['db']['params']['dbname'] = 'social';
/**
 * Настройка таблиц базы данных
 */
$config['db']['table']['prefix'] = 'prefix_';

$config['db']['table']['user'] = '___db.table.prefix___user';
$config['db']['table']['topic'] = '___db.table.prefix___topic';
$config['db']['table']['topic_tag'] = '___db.table.prefix___topic_tag';
$config['db']['table']['topic_type'] = '___db.table.prefix___topic_type';
$config['db']['table']['topic_content'] = '___db.table.prefix___topic_content';
$config['db']['table']['session'] = '___db.table.prefix___session';
//$config['db']['table']['user_field'] = '___db.table.prefix___user_field';
//$config['db']['table']['user_field_value'] = '___db.table.prefix___user_field_value';
$config['db']['table']['user_complaint'] = '___db.table.prefix___user_complaint';
//$config['db']['table']['user_changemail'] = '___db.table.prefix___user_changemail';
$config['db']['table']['property'] = '___db.table.prefix___property';
$config['db']['table']['property_target'] = '___db.table.prefix___property_target';
$config['db']['table']['property_select'] = '___db.table.prefix___property_select';
$config['db']['table']['property_value'] = '___db.table.prefix___property_value';
$config['db']['table']['property_value_tag'] = '___db.table.prefix___property_value_tag';
$config['db']['table']['property_value_select'] = '___db.table.prefix___property_value_select';
$config['db']['table']['media'] = '___db.table.prefix___media';
$config['db']['table']['media_target'] = '___db.table.prefix___media_target';
$config['db']['table']['rbac_role'] = '___db.table.prefix___rbac_role';
$config['db']['table']['rbac_permission'] = '___db.table.prefix___rbac_permission';
$config['db']['table']['rbac_role_permission'] = '___db.table.prefix___rbac_role_permission';
$config['db']['table']['rbac_role_user'] = '___db.table.prefix___rbac_role_user';
$config['db']['table']['storage'] = '___db.table.prefix___storage';
$config['db']['table']['category'] = '___db.table.prefix___category';
$config['db']['table']['category_type'] = '___db.table.prefix___category_type';
$config['db']['table']['category_target'] = '___db.table.prefix___category_target';

$config['db']['tables']['engine'] = 'InnoDB';  // InnoDB или MyISAM

/**
 * Настройки роутинга
 */
$config['router']['rewrite'] = array();
// Правила реврайта для REQUEST_URI
$config['router']['uri'] = array(
    // короткий вызов топиков из личных блогов
//    '~^(\d+)\.html~i' => "blog/\\1.html",
//    '~^sitemap\.xml~i' => "sitemap",
//    '~^sitemap_(\w+)_(\d+)\.xml~i' => "sitemap/\\1/\\2",
);
// Распределение action
$config['router']['page']['error'] = 'ActionError';
$config['router']['page']['auth'] = 'ActionAuth';
$config['router']['page']['profile'] = 'ActionProfile';
$config['router']['page']['index'] = 'ActionIndex';
$config['router']['page']['settings'] = 'ActionSettings';
$config['router']['page']['tag'] = 'ActionTag';
$config['router']['page']['rss'] = 'ActionRss';
$config['router']['page']['admin'] = 'ActionAdmin';
$config['router']['page']['ajax'] = 'ActionAjax';
$config['router']['page']['content'] = 'ActionContent';
$config['router']['page']['property'] = 'ActionProperty';
$config['router']['page']['sitemap'] = function() {
    return LS::Sitemap_ShowSitemap();
};
// Глобальные настройки роутинга
$config['router']['config']['default']['action'] = 'index';
$config['router']['config']['default']['event'] = null;
$config['router']['config']['default']['params'] = null;
$config['router']['config']['default']['request'] = null;
$config['router']['config']['action_not_found'] = 'error';
// Принудительное использование https для экшенов. Например, 'login' и 'registration'
$config['router']['force_secure'] = array();


/**
 * Подключение компонентов
 */
$config['components'] = array(
    // Базовые компоненты
    'css-reset', 'css-helpers', 'typography', 'forms', 'grid', 'ls-vendor', 'ls-core', 'ls-component', 'lightbox', 'avatar', 'slider', 'details', 'alert', 'dropdown', 'button', 'block',
    'nav', 'tooltip', 'tabs', 'modal', 'table', 'text', 'uploader', 'email', 'field', 'pagination', 'editor', 'more', 'crop',
    'performance', 'toolbar', 'actionbar', 'badge', 'autocomplete', 'icon', 'item', 'highlighter', 'jumbotron', 'notification', 'blankslate', 'confirm',

    // Компоненты LS CMS
    'auth', 'media', 'property', 'photo', 'user-list-add', 'content', 'report', 
    'toolbar-scrollup', 'toolbar-scrollnav', 'tags-personal', 'sort',  'info-list',
    'tags', 'userbar', 'admin', 'user',  'topic'
);

$config['head']['default']['js'] = array(
    //"___path.skin.web___/components/ls-vendor/html5shiv.js" => array('browser' => 'lt IE 9'),
    //"___path.skin.web___/components/ls-vendor/jquery.placeholder.min.js" => array('browser' => 'lt IE 9'),

//    "//yastatic.net/share/share.js" => array('merge' => false),
//    "https://www.google.com/recaptcha/api.js?onload=__do_nothing__&render=explicit" => array('merge' => false),
);

$config['head']['default']['css'] = array();

// Стили для RTL языков
if ( $config['view']['rtl'] ) {
    //$config['head']['default']['css'][] = "___path.skin.web___/components/vote/css/vote-rtl.css";
    //$config['head']['default']['css'][] = "___path.skin.web___/components/alert/css/alert-rtl.css";
}

/**
 * Установка локали
 */
setlocale(LC_ALL, "ru_RU.UTF-8");
date_default_timezone_set('Europe/Moscow'); // See http://php.net/manual/en/timezones.php

/**
 * Настройки типографа текста Jevix
 * Добавляем к настройках из /framework/config/jevix.php
 */
$config['jevix'] = array_merge_recursive((array)Config::Get('jevix'), require(dirname(__FILE__) . '/jevix.php'));


return $config;
