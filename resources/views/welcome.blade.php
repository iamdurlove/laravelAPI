<!doctype html>
<html lang="en">

<head>
    <title>myApp</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ route('index') }}">Navbar</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" aria-current="page">Home <span
                                class="visually-hidden">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer') }}">Records</a>
                    </li>


                </ul>

                <form class="d-flex my-2 my-lg-0">
                    <input class="form-control me-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

            </div>

        </nav>
        <a href="{{ url('/') }}" class="text-sm text-gray-700 underline">ENG</a>
        <a href="{{ url('/nep') }}" class="text-sm text-gray-700 underline">NEP</a>
        <a href="{{ url('/hin') }}" class="text-sm text-gray-700 underline">HIN</a>
    </header>



    <h1 class="text-center"> @lang('lang.welcome') </h1>
    <p class="text-center"> Laravel v{{ Illuminate\Foundation\Application::VERSION }}
    </p>


</body>

</html>
