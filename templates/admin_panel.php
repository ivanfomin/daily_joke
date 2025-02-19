<?php
include 'templates/parent.php';

echo '<h1 class="text-center"> Панель администратора </h1>';

?>
<table style="width: 100%">
    <thead>
    <tr>
        <td style="width: 6%" class="text-center"><b>ID</b></td>
        <td style="width: 50%" class="text-center"><b>Анекдот</b></td>
        <td style="width: 4%" class="text-center"><b>Лайки</b></td>
        <td style="width: 12%" class="text-center"><b>Изменить</b></td>
        <td style="width: 10%"><b>Удалить</b></td>
    </tr>
    </thead>
</table>
<?php
foreach ($this->jokes as $joke) { ?>
    <div class="list text-center">
        <form method="GET" action="../src/action.php">
            <input readonly type="number" name="id" value="<?php echo $joke->id; ?>" style="width: 6%">
            <input type="text" name="content" value="<?php echo $joke->content; ?>" style="width: 60%">
            <input type="number" name="likes" value="<?php echo $joke->likes; ?>" style="width: 5%">
            <input onclick="return confirm('Изменить?')" class="hover" type="submit" name="update" value="Изменить"
                   style="width: 12%">
            <input onclick="return confirm('Вы точно хотите удалить?')" class="hover del" id="del" type="submit"
                   name="delete" value="Удалить" style="width: 10%">
            <input hidden="hidden" name="page" value="<?= $this->current; ?>">
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

        for ($page = 1; $page <= $this->pages; $page++) {

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
<div class="text-center">
    <a href="/index.php">На главную</a>
</div>





