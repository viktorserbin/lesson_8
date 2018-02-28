<?php

/**
 * Created by PhpStorm.
 * User: Тарас
 * Date: 23.02.2018
 * Time: 20:16
 */

function getTopNavigation()
{
    $navHtml = '';

    $pages = [
        ['href' => '?page=home', 'title' => 'Home page'],
        ['href' => '?page=news_list_css', 'title' => 'News css'],
        ['href' => '?page=news_list', 'title' => 'News'],
        ['href' => '?page=admin', 'title' => 'Admin'],
        ['href' => '?page=about', 'title' => 'About us'],
        ['href' => '?page=contact', 'title' => 'Contact us'],
        ['href' => '?page=search', 'title' => 'Поиск']
    ];

    if (!empty($pages)) {
        $navHtml .= '<ul>'.PHP_EOL;
        foreach ($pages as $i => $page) {
            $navHtml .= '<li><a href="'. $page['href'] .'">'. $page['title'] .'</a></li>'.PHP_EOL;
        }
        $navHtml .= '</ul>'.PHP_EOL;
    }

    return $navHtml;
}

function textShortener ($txt, $length) {
    $current_lenght = mb_strlen($txt,"UTF-8");
    if ($length>=$current_lenght){
        return ($txt);
    }
    else {
        $word_array = str_word_count($txt, 1, "АаБбВвГгЇїІіЄєДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя");
        $end_position = 0;
        foreach ($word_array as $key => $value) {
            $position = mb_strpos($txt,$value,$end_position,"UTF-8");
            $end_position = $position + mb_strlen($value,"UTF-8");
            if ($length<=mb_strlen($value,"UTF-8")){
                $prvious_position=0;
            }
            if ($end_position>$length){
                break;
            }
            $prvious_position = $end_position;
//            echo "{$position} {$end_position} {$value}<br />";
        }
        $short_left_right=array("left"=>(mb_substr($txt,0, $prvious_position,"UTF-8")."...")
        ,"right"=>(mb_substr($txt, $prvious_position, $current_lenght,"UTF-8")));
        return $short_left_right;
    }
}

function getNewsFromFiles (){
    $file = 'data/data.txt';

    $myfile = fopen($file, "r") or  die("Unable to open file!<br />");

// Output one line until end-of-file

    while(!feof($myfile)) {
        $line = fgets($myfile);
        $line = trim($line);
        if (empty($line)){
            continue;
        }
        $position=strpos($line, "^^");
        $id=substr($line, 0, $position);
        $txt='';
        $long_news='data/txt/'.$id.'.txt';
        if (file_exists($long_news)){
            $txt=file_get_contents($long_news);
        }
        else {
            $txt='no data';
        }
        $long_short = vsprintf("%s^^%s.", textShortener ($txt, 220));
        $line .="^^".$txt."^^".$long_short;
//    $line .="^^".$txt;

        $news_box [] = explode('^^', $line);
    }
    fclose($myfile);
    return $news_box;
}