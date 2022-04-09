<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Autocomplete - Default functionality</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#tags").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{ url('cari') }}",
                        data: {
                            term: request.term
                        },
                        dataType: "json",
                        delay: 250,
                        success: function(data) {
                            var resp = $.map(data, function(obj) {
                                return obj.judul;
                            });
                            response(resp);
                        }
                    });
                },
                minLength: 2
            });
        });
    </script>
</head>

<body>

    <div class="ui-widget">
        <label for="tags">Tags: </label>
        <input id="tags">
    </div>


</body>

</html>
