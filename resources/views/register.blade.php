<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
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
    </header>

    <h1 class="text-center"> {{ $header }}</h1>
    <form action="{{ $url }}"" method="POST">
        @csrf
        <pre>
        </pre>
        <div class="container ">
            <x-input name='name' type='text' label='Enter your name' value="{{ $customer->name }}" />
            <x-input name='email' type='email' label='Enter your email' value="{{ $customer->email }}" />

            <label>
                Select Your Gender
            </label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="M"
                    {{ $customer->gender == 'M' ? 'checked' : '' }}>
                <label class="form-check-label" for="flexRadioDefault1">
                    Male
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="F"
                    {{ $customer->gender == 'F' ? 'checked' : '' }}>
                <label class="form-check-label" for="flexRadioDefault1">
                    Female
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="O">
                <label class="form-check-label" for="flexRadioDefault1" {{ $customer->gender == 'O' ? 'checked' : '' }}>
                    Other
                </label>
            </div>


            <x-input name='number' type='text' label='Enter your number' value='{{ $customer->phone }}' />
            <x-input name='address' type='text' label='Enter your address' value='{{ $customer->address }}' />
            <x-input name='country' type='text' label='Enter your country' value='{{ $customer->country }}' />
            <x-input name='password' type='password' label='Enter your password' value='' />
            <x-input name='password_confirmation' type='password' label='Confirm your password' value='' />
            <button class="btn btn-primary">Submit</button>
        </div>

    </form>
</body>

</html>
