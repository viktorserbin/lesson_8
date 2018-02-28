<?php

/**
 * Created by PhpStorm.
 * User: Тарас
 * Date: 23.02.2018
 * Time: 20:17
 */

$news_box = getNewsFromFiles();

$add_news="\"?page=add_news\"";
echo "<p>".'<a href='.$add_news.' class="button">Добавить новость.</a></p>'.PHP_EOL;

if (isset($_REQUEST['success_message'])) {
    $msg = $_REQUEST['success_message'];
    echo "<p><span class='success'>{$msg}</span></p>".PHP_EOL;
}

foreach ($news_box as $key =>$value){
    list($id,$date,$name,$news_txt)=$value;
//    list($id,$date,$name,$news_txt)=$value;
//    echo "id= {$id} <br />data= {$date} <br />name = {$name} <br />news_txt = {$news_txt}<br />short_news_txt = {$short_news_txt}<br />";
    echo '<div>';
    $show_news="\"?page=show_news&news_id={$id}\"";
    echo "<p>".'<a href='.$show_news.' class="news" title="Посмотреть"> >>> </a>';
    $data_line="{$id}^^{$date}^^{$name}";
    $delete_news="\"?page=delete_news&news_id={$id}&delete_string={$data_line}&news_name={$name}\"";
    echo '<a href='.$delete_news.' class="news" title="Удалить"> <img src="images/delete.png" width="15" /> </a>';
    echo "<strong>{$name} </strong>";
    echo "{$date}</p>".PHP_EOL;
//    echo "<p>{$short_news_txt} 321321</p>";
//    echo "<p>{$after_short_news_txt} 123123</p>";
    echo '</div>';
}

echo "<p>".'<a href='.$add_news.' class="button">Добавить новость.</a></p>'.PHP_EOL;