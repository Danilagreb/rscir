<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        * {
            font-size: 30px;
        }
    </style>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unix_commands</title>
</head>
<body>
<a href='unix_commands.php?command=ls'>LS</a>
<a href='unix_commands.php?command=ps'>PS</a>
<a href='unix_commands.php?command=whoami'>WHOAMI</a>
<a href='unix_commands.php?command=id'>ID</a>
<a href='unix_commands.php?command=pwd'>PWD</a>
<br>
<?php
include 'unix_commands_helper.php';

if (isset($_GET['command'])) {
    try {
        echo get_result($_GET['command']);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {
    echo 'Выберите команду';
}
?>
</body>
</html>