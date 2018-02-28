<?php
/**
 * Created by PhpStorm.
 * User: sinor
 * Date: 26.02.2018
 * Time: 23:51
 */
$news_id=$_REQUEST['news_id'];
//echo "{$news_id}";

$news_box = getNewsFromFiles();

/*
echo "<pre>";
var_dump($news_box);
echo "</pre>";
*/

echo '<a class="news" href="#" onclick="location.href = document.referrer; return false;"><<<</a>'.PHP_EOL;
foreach ($news_box as $key =>$value){
    list($id,$date,$name,$news_txt,$short_news_txt,$after_short_news_txt)=$value;
//    list($id,$date,$name,$news_txt)=$value;
//    echo "id= {$id} <br />data= {$date} <br />name = {$name} <br />news_txt = {$news_txt}<br />short_news_txt = {$short_news_txt}<br />";
    if ($id==$news_id) {
        echo '<div>';
        echo "<strong>{$name}</strong><br />".PHP_EOL;
        echo "<p>{$date}<br/><br/>".PHP_EOL;
        $show_news = "?page=show_news&news_id={$id}";
        echo "{$news_txt}</p>".PHP_EOL;
//    echo "<p>{$short_news_txt} 321321</p>";
//    echo "<p>{$after_short_news_txt} 123123</p>";
        echo "<hr>";
        echo '</div>';
    }
}
echo '<a class="news" href="#" onclick="location.href = document.referrer; return false;"><<<</a>';
//$news_content = ob_get_contents();

//echo $news_content;
?>