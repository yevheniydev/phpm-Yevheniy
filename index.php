<?php
// Соединяемся, выбираем базу данных
$link = mysqli_connect('localhost', 'root', '', 'phpm')  or die('Не удалось соединиться: ' . mysqli_error());
echo 'Соединение успешно установлено';


// Выполняем SQL-запрос
// $query = $query("SELECT * FROM user", MYSQLI_USE_RESULT);
$result = $link->query("SELECT * FROM user", MYSQLI_USE_RESULT) or die('Запрос не удался: ' . mysqli_error());

// Выводим результаты в html
echo "<table>\n";
while ($line = $result -> fetch_assoc()) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Освобождаем память от результата
mysqli_free_result($result);

// Закрываем соединение
mysqli_close($link);
?>
