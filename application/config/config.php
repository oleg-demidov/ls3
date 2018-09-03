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
$config['view']['skin'] = 'developer';        // Название текущего шаблона
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
 * Настройки ACL(Access Control List — список контроля доступа)
 */
$config['acl']['create']['blog']['rating'] = 1;  // порог рейтинга при котором юзер может создать коллективный блог
$config['acl']['create']['comment']['rating'] = -10; // порог рейтинга при котором юзер может добавлять комментарии
$config['acl']['create']['comment']['limit_time'] = 10; // время в секундах между постингом комментариев, если 0 то ограничение по времени не будет работать
$config['acl']['create']['comment']['limit_time_rating'] = -1;  // рейтинг, выше которого перестаёт действовать ограничение по времени на постинг комментов. Не имеет смысла при $config['acl']['create']['comment']['limit_time']=0
$config['acl']['create']['topic']['limit_time'] = 240;// время в секундах между созданием записей, если 0 то ограничение по времени не будет работать
$config['acl']['create']['topic']['limit_time_rating'] = 5;  // рейтинг, выше которого перестаёт действовать ограничение по времени на создание записей
$config['acl']['create']['topic']['limit_rating'] = -20;// порог рейтинга при котором юзер может создавать топики (учитываются любые блоги, включая персональные), как дополнительная защита от спама/троллинга
$config['acl']['create']['talk']['limit_time'] = 300; // время в секундах между отправкой инбоксов, если 0 то ограничение по времени не будет работать
$config['acl']['create']['talk']['limit_time_rating'] = 1;   // рейтинг, выше которого перестаёт действовать ограничение по времени на отправку инбоксов
$config['acl']['create']['talk_comment']['limit_time'] = 10; // время в секундах между отправкой инбоксов, если 0 то ограничение по времени не будет работать
$config['acl']['create']['talk_comment']['limit_time_rating'] = 5;   // рейтинг, выше которого перестаёт действовать ограничение по времени на отправку инбоксов
$config['acl']['create']['wall']['limit_time'] = 20;   // рейтинг, выше которого перестаёт действовать ограничение по времени на отправку сообщений на стену
$config['acl']['create']['wall']['limit_time_rating'] = 0;   // рейтинг, выше которого перестаёт действовать ограничение по времени на отправку сообщений на стену
$config['acl']['update']['comment']['rating'] = -5;   // порог рейтинга при котором юзер может редактировать комментарии
$config['acl']['update']['comment']['limit_time'] = 60 * 3;   // время в секундах после создания комментария, когда можно его отредактировать, если 0 то ограничение по времени не будет работать
$config['acl']['vote']['comment']['rating'] = -3;  // порог рейтинга при котором юзер может голосовать за комментарии
$config['acl']['vote']['topic']['rating'] = -7;  // порог рейтинга при котором юзер может голосовать за топик
$config['acl']['vote']['topic']['limit_time'] = 60 * 60 * 24 * 20; // ограничение времени голосования за топик
$config['acl']['vote']['comment']['limit_time'] = 60 * 60 * 24 * 5;  // ограничение времени голосования за комментарий


// Модуль User

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


// Модуль Security
$config['module']['security']['hash'] = "livestreet_security_key"; // "примесь" к строке, хешируемой в качестве security-кода

$config['module']['userfeed']['count_default'] = 10; // Число топиков в ленте по умолчанию

$config['module']['stream']['count_default'] = 20; // Число топиков в ленте по умолчанию
$config['module']['stream']['disable_vote_events'] = false;
// Модуль Ls
$config['module']['ls']['send_general'] = true;    // Отправка на сервер LS общей информации о сайте (домен, версия LS и плагинов)
$config['module']['ls']['use_counter'] = true;    // Использование счетчика GA
// Модуль Sitemap
$config['module']['sitemap']['index'] = array(  // Главная страница
    'priority' => '1',
    'changefreq' => 'hourly' // Вероятная частота изменения этой страницы (https://www.sitemaps.org/ru/protocol.html#changefreqdef)
);

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
$config['db']['table']['content'] = '___db.table.prefix___content';
$config['db']['table']['session'] = '___db.table.prefix___session';
$config['db']['table']['media'] = '___db.table.prefix___media';
$config['db']['table']['media_target'] = '___db.table.prefix___media_target';
$config['db']['table']['rbac_role'] = '___db.table.prefix___rbac_role';
$config['db']['table']['rbac_permission'] = '___db.table.prefix___rbac_permission';
$config['db']['table']['rbac_role_permission'] = '___db.table.prefix___rbac_role_permission';
$config['db']['table']['rbac_role_user'] = '___db.table.prefix___rbac_role_user';

$config['db']['tables']['engine'] = 'InnoDB';  // InnoDB или MyISAM

/**
 * Настройки роутинга
 */
$config['router']['rewrite'] = array();
// Правила реврайта для REQUEST_URI
$config['router']['uri'] = array(
    // короткий вызов топиков из личных блогов
    '~^(\d+)\.html~i' => "blog/\\1.html",
    '~^sitemap\.xml~i' => "sitemap",
    '~^sitemap_(\w+)_(\d+)\.xml~i' => "sitemap/\\1/\\2",
);
// Распределение action
$config['router']['page']['error'] = 'ActionError';
$config['router']['page']['auth'] = 'ActionAuth';
$config['router']['page']['admin'] = 'ActionAdmin';

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
 * Настройки вывода блоков
 */
//$config['block']['rule_index_blog'] = array(
//    'action' => array(
//        'index',
//        'blog' => array('{topics}', '{blog}')
//    ),
//    'blocks' => array(
//        'right' => array(
//            'activityRecent' => array('priority' => 100),
//            'topicsTags'   => array('priority' => 50),
//            'blogs'  => array('params' => array(), 'priority' => 1)
//        )
//    ),
//    'clear'  => false,
//);


/**
 * Подключение компонентов
 */
$config['components'] = array(
    // Базовые компоненты
    'css-reset', 'css-helpers', 'typography', 'forms', 'grid', 'ls-vendor', 'ls-core', 'ls-component', 'lightbox', 'avatar', 'slider', 'details', 'alert', 'dropdown', 'button', 'block',
    'nav', 'tooltip', 'tabs', 'modal', 'table', 'text', 'uploader', 'email', 'field', 'pagination', 'editor', 'more', 'crop',
    'performance', 'toolbar', 'actionbar', 'badge', 'autocomplete', 'icon', 'item', 'highlighter', 'jumbotron', 'notification', 'blankslate', 'confirm',

    // Компоненты LS CMS
    
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
