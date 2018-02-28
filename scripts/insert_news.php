<?php
/**
 * Created by PhpStorm.
 * User: sinor
 * Date: 27.02.2018
 * Time: 22:26
 */

//echo "insert news<br/>";
if ($_POST){
    $last_news_id_file='data/last_news.txt';
    if (file_exists($last_news_id_file)){
        $last_news_id=file_get_contents($last_news_id_file);
        $last_news_id++;
        echo "last news id: {$last_news_id}<br />";
//        echo "last news id file: {$last_news_id_file}<br />";
    }
    else {
        die ("Не могу найти {$last_news_id_file}");
    }

    $news_name=$_POST['news_name'] or die ("Пустое значение 'news_name'");
    $news_date=$_POST['news_date'] or die ("Пустое значение 'news_date'");
    $news_text=$_POST['news_text'] or die ("Пустое значение 'news_text'");
//    echo "{$news_name} : {$news_date} : {$news_text}";

    $insert_string_to_file="{$last_news_id}^^{$news_date}^^{$news_name}".PHP_EOL;
//    echo $insert_string_to_file;
    $news_data_file='data/data.txt';
    if (file_exists($news_data_file)){
        file_put_contents($news_data_file, $insert_string_to_file, FILE_APPEND | LOCK_EX) or
        die ("Не могу записать в {$news_data_file}");
    }
    else {
        die ("Не могу найти {$last_news_id_file}");
    }
    $last_news_data_file="data/txt/{$last_news_id}.txt";
    $myfile = fopen($last_news_data_file, "w") or die("Не могу создать {$last_news_data_file}");
    fwrite($myfile, $news_text) or die("Не могу записать в {$last_news_data_file}");
    fclose($myfile);

    file_put_contents($last_news_id_file, $last_news_id)
    or die("Не могу записать в {$last_news_id_file}");
}
else {
    die ("Нет _Post");
}
$msg = "Новость <strong>{$news_name}</strong> успешно добавленна";
header("Location: ?page=admin&success_message={$msg}");