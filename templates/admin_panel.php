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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Админ панель</title>
    <link rel="stylesheet" href="/templates/style.css">
</head>
<body>
<?php

echo '<h1 class="text-center"> Панель администратора </h1>';
foreach ($this->jokes as $joke) { ?>
    <div class="list">
        <form method="GET" action="../src/action.php">
            <input readonly type="number" name="id" value="<?php echo $joke->id; ?>" style="width: 6%">
            <input type="text" name="content" value="<?php echo $joke->content; ?>" style="width: 60%">
            <input type="number" name="likes" value="<?php echo $joke->likes; ?>" style="width: 5%">
            <input onclick="return confirm('Изменить?')" class="hover" type="submit" name="update" value="Изменить"
                   style="width: 12%">
            <input onclick="return confirm('Вы точно хотите удалить?')" class="hover del" id="del" type="submit"
                   name="delete" value="Удалить" style="width: 10%">
        </form>
    </div>
<?php }
?>

<br>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">

        <?php
        $previous = $this->current - 1;
        echo '<li class="page-item "><a class="page-link" href="/?ctrl=Admin&act=' . $previous . '"> Предыдущая </a></li>';

        for ($page = 1; $page < $this->pages; $page++) {

            if ($this->current == $page) {
                echo '<li class="page-item active"><a class="page-link" href="/?ctrl=Admin&act=' . $page . '">' . $page . '</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="/?ctrl=Admin&act=' . $page . '">' . $page . '</a></li>';
            }
        }
        $next = $this->current + 1;
        if ($next > $this->pages) {
            $next = $this->pages;
        }
        echo '<li class="page-item"><a class="page-link" href="/?ctrl=Admin&act=' . $next . '"> Следующая </a></li>';
        ?>

    </ul>
</nav>


<h2 class="text-center"> Добавить анекдот </h2>

<div class="text-center ">
    <form method="GET" action="../src/action.php">

        <label>
            <textarea rows="8" cols="70" style="height:100%;" name="content" class="form-control"></textarea>
        </label>

        <br>
        <button onclick="return confirm('Добавить анекдот?')" class="hover sub_joke" name="insert">Сохранить</button>
    </form>
</div>
<br>
<a class="wrap" href="/index.php">На главную</a>

</body>
</html>
