<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Kraf Heinz ABC - @yield('title')</title>
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/user-auth.css') }}">
</head>

<body>
  <main class="auth-page-main">
    <div class="container">
      <div class="card card-auth p-4">
        <div class="text-center mb-4">
          <img src="{{ asset('assets/images/logo2.png') }}" alt="Logo App" class="img-fluid logo-app">
        </div>
        @yield('content')
      </div>
     </div>
  </main>
</body>

</html>