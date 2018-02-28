<?php

$news_box = getNewsFromFiles();

/*
echo "<pre>";
var_dump($news_box);
echo "</pre>";
*/
foreach ($news_box as $key =>$value){
//    list($id,$date,$name,$news_txt,$short_news_txt,$after_short_news_txt)=$value;
    list($id,$date,$name,$news_txt)=$value;
//    echo "id= {$id} <br />data= {$date} <br />name = {$name} <br />news_txt = {$news_txt}<br />short_news_txt = {$short_news_txt}<br />";
    echo '<div class="panel-wrapper">';
    echo '<a href="#show'.$id.'" class="show btn" id="show'.$id.'">>>></a>';
    echo '<a href="#hide'.$id.'" class="hide btn" id="hide'.$id.'"><<<</a>';
    echo '<div class="panel">';
    echo "<strong>{$name}</strong><br />";
    echo "<p>{$date}<br/><br/>";
    echo "{$news_txt}</p>";
//    echo "<p>{$short_news_txt} 321321</p>";
//    echo "<p>{$after_short_news_txt} 123123</p>";
    echo "<hr>";
    echo '</div><!-- end panel -->';
    echo '<div class="fade"></div>';
    echo '</div><!-- end panel-wrapper -->';
}
?>