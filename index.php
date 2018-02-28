<?php

/**
 * Created by PhpStorm.
 * User: Тарас
 * Date: 23.02.2018
 * Time: 20:15
 */


require_once './includes' . DIRECTORY_SEPARATOR . 'functions.php';

ob_start();
@$page = $_REQUEST['page'];
//echo "{$page}<br />";

switch ($page)
{
    case 'about':
        $title = 'About us';
        $h1 = 'About us pag';
        include_once './template' . DIRECTORY_SEPARATOR . 'about.php';
        break;
    case 'contact':
        $title = 'Contact us';
        $h1 = 'Contact us page';
        include_once './template' . DIRECTORY_SEPARATOR . 'contact.php';
        break;
    case 'show_news':
        $title = 'News';
        $h1 = 'Contact us page';
        include_once './template' . DIRECTORY_SEPARATOR . 'show_news.php';
        break;
    case 'news_list_css':
        $title = 'News css';
        $h1 = 'Contact us pag';
        include_once './template' . DIRECTORY_SEPARATOR . 'news_list_css.php';
        break;
    case 'news_list':
        $title = 'News';
        $h1 = 'Contact us page';

        include_once './template' . DIRECTORY_SEPARATOR . 'news_list.php';
        break;
    case 'admin':
        $title = 'Admin';
        $h1 = 'Contact us page';

        include_once './template' . DIRECTORY_SEPARATOR . 'admin.php';
        break;
    case 'search':
        $title = 'Search';
        $h1 = 'Search us page';
        include_once './template' . DIRECTORY_SEPARATOR . 'search.php';
        break;
    case 'add_news':
        $title = 'Search';
        $h1 = 'Search us page';
        include_once './template' . DIRECTORY_SEPARATOR . 'add_news.php';
        break;
    case 'insert_news':
        $title = 'Search';
        $h1 = 'Search us page';
        include_once './scripts' . DIRECTORY_SEPARATOR . 'insert_news.php';
        break;
    case 'delete_news':
        $title = 'Search';
        $h1 = 'Search us page';
        include_once './scripts' . DIRECTORY_SEPARATOR . 'delete_news.php';
        break;
    case 'home':
    default:
        $title = 'Default page';
        $h1 = 'Default page';
        include_once './template' . DIRECTORY_SEPARATOR . 'home.php';
        break;
}

$topNav = getTopNavigation();

$content = ob_get_contents();
ob_end_clean();

 // echo $content;

include_once './template' . DIRECTORY_SEPARATOR . '_layout.php';
