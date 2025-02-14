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
    <title>Анекдоты</title>
</head>
<body class="d-flex flex-column min-vh-100">
<div class="text-center pb-2 mb-4  border-bottom border-danger">
    <h1>
        Анекдот дня
    </h1>
</div>
<div class="wrapper flex-grow-1">
    <?php

    echo '<div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end cont">' .
        $this->joke->content .
        '</div>';
    echo '<br><button type="button" class="btn btn-success btn-sm">Нравится<span class="badge badge-light count">' . $this->joke->likes . '</span></button>';
    echo '<span hidden="hidden" class="id_joke">' . $this->joke->id . '</span>';

    ?>
</div>

<footer>
    © 2025 Ivan Fomin Copyright
</footer>

<script>

    $(document).ready(function () {
        $('button.btn').on('click', function () {
            let cnt = Number($('span.count').text());
            let id_joke = $('span.id_joke').text();
            let cont = $('div.cont').text();
            cnt++;
            $.ajax({
                method: 'get',
                url: '../src/action.php',
                data: {likes: cnt, id: id_joke, content: cont, update: true},
                success: function (data) {
                    //window.alert(content);
                    $('span.count').text(cnt);
                }

            });
        })
    });

</script>


</body>
</html>

