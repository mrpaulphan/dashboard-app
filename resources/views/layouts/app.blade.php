<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="body container">
      <aside class=" container__sidebar sidebar">
        <header class="sidebar__header">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/50/Oracle_logo.svg/1280px-Oracle_logo.svg.png" alt="Site Logo">
        </header>
        <nav class="sidebar__nav nav">
          <a class="nav__link" href="#">Dashboard</a>
          <a class="nav__link" href="{{ route('get.projects') }}">Projects</a>
          <a class="nav__link" href="{{ route('get.invoices')}}">Invoice</a>
          <a class="nav__link" href="#">Issues</a>
          <a class="nav__link" href="#">Users</a>
          <a class="nav__link" href="#">Companies</a>
        </nav>
      </aside>
      <main class="container__main" >
        @yield('content')
      </main>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
