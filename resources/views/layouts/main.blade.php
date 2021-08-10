<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Strona z obrazkami i filmikami" />
    <meta name="author" content="Marcin Wawreczko, Adrian Treściński" />
    <meta name="keywords" content="JobZpatycku, memy, posty, filmiki, movies, images" />
    <link rel="shortcut icon" type="{{ url('image/x-icon') }}" href="{{ url('/img/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ url('/css/main.css') }}" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
    <title>JebZPatycku</title>
</head>

<body>
    <!-- Header content -->
    <x-nav></x-nav>
    <!-- Section content -->
    <section id="content">
        <div class="container">
            <main class="main-content">
                <!-- Main content on the page -->
                {{ $slot }}
                <!-- Aside content -->
            </main>
            <x-sidebar></x-sidebar>
        </div>
    </section>
    @include('components.footer')
    {{ $script }}
    <script src="https://kit.fontawesome.com/7e577ef14f.js" crossorigin="anonymous"></script>
</body>

</html>
