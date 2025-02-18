<?php
include 'templates/parent.php';
if (isset($_SESSION['message'])) {
    echo '<h1 style="color: crimson; margin-left: 16%">' . $_SESSION['message'] . '</h1>';
}
?>
<div class="container">
    <form class="form-inline" action="/templates/login.php" method="POST">
        <label class="sr-only" for="inlineFormInputName2">Пароль</label>
        <input type="password" name="password" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2"
               placeholder="***">

        <div class="form-check mb-2 mr-sm-2">
            <input class="form-check-input" name="memory" type="checkbox" id="inlineFormCheck">
            <label class="form-check-label" for="inlineFormCheck">
                Remember me
            </label>
        </div>

        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </form>
</div>



