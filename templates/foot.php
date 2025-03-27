<footer class="text-center p-3 footer" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2025 | Ivan Fomin
</footer>
</body>
</html>
<script>
    $(document).ready(function () {
        $('button.dislike').on('click', function () {
            if (localStorage.getItem('dislike') === '0' || localStorage.getItem('dislike') === null) {
      window.alert(localStorage.getItem('like'));
            window.alert(localStorage.getItem('dislike'));
                let cnt = Number($('span.count').text());
                let id_joke = $('span.id_joke').text();
                let cont = $('p.cont').text();
                if (localStorage.getItem('like') === '1') {
                    cnt = cnt - 2;
                } else {
                    cnt--;
                }
                localStorage.setItem('dislike', '1');
                localStorage.setItem('like', '0');
                $.ajax({
                    method: 'get',
                    url: '../src/action.php',
                    data: {likes: cnt, id: id_joke, content: cont, update: true},
                    success: function (data) {
                        $('span.count').text(cnt);
                    },
                    error: function (data) {
                        window.alert(data);
                    }

                });
            }

        });

        $('button.like').on('click', function () {
            window.alert(localStorage.getItem('like'));
            window.alert(localStorage.getItem('dislike'));

            if (localStorage.getItem('like') === '0' || localStorage.getItem('like') === null) {
                let cnt = Number($('span.count').text());
                let id_joke = $('span.id_joke').text();
                let cont = $('p.cont').text();
                if (localStorage.getItem('dislike') === '1') {
                    cnt = cnt + 2;
                } else {
                    cnt++;
                }
                localStorage.setItem('dislike', '0');
                localStorage.setItem('like', '1');

                $.ajax({
                    method: 'get',
                    url: '../src/action.php',
                    data: {likes: cnt, id: id_joke, content: cont, update: true},
                    success: function (data) {
                        $('span.count').text(cnt);
                    },
                    error: function (data) {
                        window.alert(data);
                    }

                });
            }

        })
    });

</script>