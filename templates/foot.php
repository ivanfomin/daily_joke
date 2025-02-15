<footer class="text-center p-3 footer" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2025 | Ivan Fomin
</footer>
<script>
    $(document).ready(function () {
        $('button.btn').on('click', function () {
            let session = $('span.session').text();
            if (localStorage.getItem('session') !== session) {
                let cnt = Number($('span.count').text());
                let id_joke = $('span.id_joke').text();
                let cont = $('div.cont').text();
                cnt++;
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
            localStorage.setItem('session', session);

        })
    });

</script>