<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Админ панель</title>
    <link rel="stylesheet" href="/templates/style.css">
</head>
<body>
<?php
echo '<h1> Панель администратора </h1>';
foreach ($this->jokes as $joke) { ?>
    <div>
        <form method="GET" action="../src/action.php">
            <input readonly type="number" name="id" value="<?php echo $joke->id; ?>" style="width: 5%">
            <input type="text" name="content" value="<?php echo $joke->content; ?>" style="width: 50%">
            <input type="number" name="likes" value="<?php echo $joke->likes; ?>" style="width: 5%">
            <input onclick="return confirm('Изменить?')" class="hover" type="submit" name="update" value="Изменить">
            <input onclick="return confirm('Вы точно хотите удалить?')" class="hover del" id="del" type="submit" name="delete" value="Удалить">
        </form>
    </div>
<?php }
?>
<p class="wrap"> Добавить анекдот </p>

<div>
    <form method="GET" action="../src/action.php">
        <label>
            <textarea name="content" style="width: 70%"></textarea>
        </label>
        <br>
        <button class="hover" name="insert">Сохранить</button>
    </form>
</div>
<br>
<a class="wrap" href="/index.php">На главную</a>

</body>
</html>
<?php
