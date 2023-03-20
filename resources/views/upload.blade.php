<!doctype html>
<html lang="en">

<head>
    <title>File Upload</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <form method="post" action="{{ route('upload') }}" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="mb-3">
                <label for="" class="form-label">File</label>
                <input type="file" name="image" id="" class="form-control" placeholder=""
                    aria-describedby="helpId">
            </div>
            <button class="btn-primary btn">Upload</button>
        </div>
    </form>

</body>

</html>
