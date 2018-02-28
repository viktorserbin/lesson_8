<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Домашнее задание php, урок 8</title>
    <link href='css/style.css' rel='stylesheet' type='text/css'>
    <script src="js/script.js"></script>
</head>
<body>
<div id="header"><h1 class="header">Новости отовсюд, демо сайт.</h1></div>

<div id="content">

<?php

    require_once '_header.php';

?>

<?php

    echo $content;

?>

</div>
<div id="footer">
<?php

require_once '_footer.php';

?>
</div>
</body>
</html>
