<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Not article</title>
</head>
<body>
<?php
foreach ($exceptions as $exception) {
    ?> <h1 style="color: indianred "><?= $exception->getMessage(); ?></h1>
<?php
}
?>
<a href="/?ctrl=Admin">Вернуться</a>

</body>
</html>