<?php
include 'templates/parent.php';
?>
<body class="d-flex flex-column min-vh-100">
<div class="text-center pb-2 mb-4  border-bottom border-danger">

    <img src="/templates/media/joke.jpg" width="52" style="margin-top: 10px" class=" center" alt="Joke_Logo">
    <h1>Ежедневный анекдот</h1>

</div>
<div class="d-flex justify-content-center"> <!--wrapper flex-grow-1 text-center-->
    <?php

    echo '<div class="p-2 bg-info bg-opacity-10 border border-info border-start-0
 rounded-end ">
        <div class="col-lg-6  p-2 text-right cont">' .
        $this->joke->content .
        '</div>
        <div><button type="button" class="btn btn-success btn-sm">Нравится<span
                    class="badge badge-light count">' . $this->joke->likes . '</span></button></div>
        </div>
      <span hidden="hidden" class="id_joke">' . $this->joke->id . '</span>
      <span hidden="hidden" class="session">' . session_id() . '</span>';

    ?>
</div>
<br>


</body>
<?php
include 'templates/foot.php';
?>

</html>

