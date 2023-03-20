<!doctype html>
<html lang="en">

<head>
    <title>Customer Trash</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark  ">
            <a class="navbar-brand" href="{{ route('index') }}">
                @if (session()->has('user_name'))
                    {{ session('user_name') }}
                @else
                    Guest
                @endif
            </a>
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
    </header>



    <h1 class="text-center m-2"> Customer Trash Records</h1>
    <div class="container">
        <a href="{{ route('customer') }}">
            <button class="btn btn-primary d-inline-block m-2">Records</button>
        </a>
        <div class="table-responsive">

            <table class="table table-primary">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Country</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $data)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>
                                @if ($data->gender == 'M')
                                    Male
                                @elseif ($data->gender == 'F')
                                    Female
                                @else
                                    Other
                                @endif
                            </td>
                            <td>{{ $data->address }}</td>
                            <td>{{ $data->country }}</td>
                            <td>
                                @if ($data->status == 1)
                                    <button class="btn btn-sm btn-success">
                                    </button>
                                @else
                                    <button class="btn btn-sm btn-danger">
                                    </button>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-sm btn-danger"
                                    href="{{ route('customer.forcedelete', ['id' => $data->id]) }}">
                                    Delete
                                </a>
                                <a class="btn btn-sm btn-primary"
                                    href="{{ route('customer.restore', ['id' => $data->id]) }}">
                                    Restore
                                </a>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>

</body>

</html>
