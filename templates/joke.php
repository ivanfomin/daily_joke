<?php
include 'templates/parent.php';
?>
<body class="d-flex flex-column min-vh-100">

<main>

    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="/templates/media/joke.jpg" alt="" width="72" height="57">
        <h1 class="display-5 fw-bold">Ежедневный анекдот</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4 cont"> <?= $this->joke->content; ?> </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button type="button" class="btn btn-primary btn-lg px-4 gap-3 plus">Нравится</button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4 minus">Не нравится</button>
                <button disabled type="button" class="btn btn-success btn-sm">
                    <img src="/templates/media/like.jpg" alt="" width="20" height="20">
                    <span
                            class="badge badge-light count"> <?= $this->joke->likes; ?></span></button>
                <span hidden="hidden" class="id_joke"> <?= $this->joke->id; ?></span>
                <span hidden="hidden" class="session"><?= session_id(); ?></span>
            </div>
        </div>
    </div>
</main>


</body>
<?php
include 'templates/foot.php';
?>

</html>

