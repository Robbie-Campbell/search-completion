 <!-- A youtube tutorial from veryacademy on searchbar completion -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search suggestions</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
</head>
<body>
    <div class="container text-light mt-5">
        <div class="row justify-content-md-center">
            <div class="col-md-5 bg-dark p-3">
                <h1 class="text-center">Search for a name</h1>
                    <form id="form">
                        <div class="form-group">
                            <label for="search">Type in a name</label>
                            <input type="text" class=form-control" id="search_box" placeholder="Insert name">
                        </div>
                    </form>
                <div id="search_results">Name suggestions will appear here</div>
            </div>
        </div>
    </div>

<script>
    $('#search_box').keyup(function(){
        var search_term = $('#search_box').val().trim();
    $.ajax({
        type: "POST",

        url: 'process.php',

        data: { search: search_term },

        success: function(response)
        {
            $("#search_results").html('');

            var jsonData = JSON.parse(response);

            $.each(jsonData, function(key, val){
                $('#search_results').append(val.name + '<br>');
                console.log(val.name);
            });
        }
    });
});
</script>
</body>
</html>