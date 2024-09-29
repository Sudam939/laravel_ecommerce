<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Code IT Market</title>
    @vite(['resources/css/app.css','resources/js/app.js'])

    <link rel="stylesheet" href="/frontend/style.css">
    <link rel="stylesheet" href="/fontawesome/css/all.min.css">

</head>

<body>
    @include('sweetalert::alert')

    <header>
    </header>


    <main>
        <x-frontend-navbar />
        {{ $slot }}
    </main>


    <footer></footer>

</body>

</html>
