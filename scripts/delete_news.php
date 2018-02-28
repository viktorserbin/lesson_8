<?php
/**
 * Created by PhpStorm.
 * User: sinor
 * Date: 27.02.2018
 * Time: 22:26
 */

//echo "insert news<br/>";
if ($_GET){
    $news_id=$_GET['news_id'] or die ("Пустое значение 'news_id'");
    $delete_string=$_GET['delete_string'] or die ("Пустое значение 'delete_string'");
    $news_name=$_GET['news_name'] or die ("Пустое значение 'news_name'");
//    echo "{$news_id} <br /> {$delete_string} <br /> {$news_name} <br />";

    $news_data_file='data/data.txt';
    if (file_exists($news_data_file)){
        $contents = file_get_contents($news_data_file) or die ("Не могу открыть {$news_data_file}");
        $contents = str_replace($delete_string.PHP_EOL, '', $contents);
        file_put_contents($news_data_file, $contents) or
        die ("Не могу записать в {$news_data_file}");
    }
    else {
        die ("Не могу найти {$news_data_file}");
    }
    $id_data_file="data/txt/{$news_id}.txt";
    unlink($id_data_file) or die("Не могу удалить {$id_data_file}");;

}
else {
    die ("Нет _GET");
}
$msg = "Новость <strong>{$news_name}</strong> успешно удалена";
 header("Location: ?page=admin&success_message={$msg}");