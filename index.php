<?php

require_once('vendor/autoload.php');

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array());

// echo $twig->render('index.php', array(
//   'name' => 'Fabien'
//
// ));

$link = mysqli_connect('localhost', 'root', '', 'phpm')  or die('Не удалось соединиться: ' . mysqli_error());
echo 'Соединение успешно установлено';

// Выполняем SQL-запрос
// $query = $query("SELECT * FROM user", MYSQLI_USE_RESULT);
$result = $link->query("SELECT * FROM user", MYSQLI_USE_RESULT) or die('Запрос не удался: ' . mysqli_error());

// Выводим результаты в html


while ($line = $result -> fetch_assoc()) {

    foreach ($line as $col_value) {
        echo'<br>'. "$col_value";
    }

}



// Освобождаем память от результата
mysqli_free_result($result);

// Закрываем соединение
mysqli_close($link);
