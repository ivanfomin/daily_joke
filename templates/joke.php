<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Ежедневный анекдот"/>
    <link rel="shortcut icon"
          href="https://icon-library.com/images/jokes-icon/jokes-icon-18.jpg" type="image/x-icon">
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
    <link rel="stylesheet" type="text/css" href="/templates/style.css">
    <title>Анекдоты</title>
</head>
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

