<?php

$news_box = getNewsFromFiles();

//echo "<pre>";
//var_dump($news_box);
//echo "</pre>";

foreach ($news_box as $key =>$value){
    list($id,$date,$name,$news_txt,$short_news_txt,$after_short_news_txt)=$value;
//    list($id,$date,$name,$news_txt)=$value;
//    echo "id= {$id} <br />data= {$date} <br />name = {$name} <br />news_txt = {$news_txt}<br />short_news_txt = {$short_news_txt}<br />";
    echo '<div>';
    echo "<p><strong>{$name}</strong></p>".PHP_EOL;
    echo "<p>{$date}</p>".PHP_EOL;
    $show_news="\"?page=show_news&news_id={$id}\"";
    echo "<p>{$short_news_txt}".'<a href='.$show_news.' class="news"> >>></a></p>'.PHP_EOL;
//    echo "<p>{$short_news_txt} 321321</p>";
//    echo "<p>{$after_short_news_txt} 123123</p>";
    echo "<hr>";
    echo '</div>';
}