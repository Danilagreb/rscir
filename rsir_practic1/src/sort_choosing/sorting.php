<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Array sort</title>
</head>
<body>

<?php
include 'sorting_shell.php';
$params = 0;
//isset — Определяет, была ли установлена переменная значением, отличным от null
if (!isset($_GET["array"])) {
    echo "Введите параметры";
} else {
    $params = $_GET["array"]; //Возвращает строку с параметрами
    echo "Исходный массив: " . $params . "<br/>";

    //Проверяем, что массив содержит только целые числа
    if (!ctype_digit(str_replace(['-', ',', '.'], '', $params))) {
        echo 'Введите верный массив!';
    } else {
        //Преобразует строку в массив чисел (целых или с плав. точкой)
        $integers = array_map('floatval', explode(',', $params));
        $integers = shell_Sort($integers);
        echo "Отсортированный массив: " . implode(" ", $integers) . "<br/>";
    }
}
?>
</body>
</html>