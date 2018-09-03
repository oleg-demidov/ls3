<?php

$config = array();


// Подключение скриптов шаблона
$config['head']['template']['js'] = array(
	'___path.skin.assets.web___/js/init.js'
);

// Подключение стилей шаблона
$config['head']['template']['css'] = array(
	"___path.skin.assets.web___/css/layout.css",
	"___path.skin.assets.web___/css/print.css"
);

// Подключение темы
if (Config::Get('view.theme')) {
	$config['head']['template']['css'][] = "___path.skin.web___/themes/___view.theme___/style.css";
}

/**
 * SEO
 */

// Тег используемый для заголовков топиков
$config['view']['seo']['topic_heading'] = 'h1';
$config['view']['seo']['topic_heading_list'] = 'h2';

return $config;