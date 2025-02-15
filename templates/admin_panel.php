<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/templates/style.css">
</head>
<body>
<?php
echo '<h1> Панель администратора </h1>';
foreach ($this->jokes as $joke) { ?>
    <div>
        <form method="GET" action="../src/action.php">
            <input type="number" name="id" value="<?php echo $joke->id; ?>" style="width: 5%">
            <input type="text" name="content" value="<?php echo $joke->content; ?>" style="width: 50%">
            <input type="number" name="likes" value="<?php echo $joke->likes; ?>" style="width: 5%">
            <input type="submit" name="update" value="Изменить">
            <input type="submit" name="delete" value="Удалить">
        </form>
    </div>
<?php }
?>
<p class="wrap"> Добавить анекдот </p>

<div>
    <form method="GET" action="../src/action.php">
        <input type="text" name="content" style="width: 50%">
        <input type="submit" name="insert" value="Сохранить">
    </form>
</div>
<br>
<a class="wrap" href="/index.php">На главную</a>

</body>
</html>
<?php
