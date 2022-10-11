<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand text-white" href="#">LaraPost</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ">
                  <li class="nav-item ">
                    <a class="nav-link text-white" aria-current="page" href="{{ route('post.index') }}">Posts</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('post.create') }}">Create</a>
                  </li>

                </ul>
              </div>
            </div>
        </nav>

       <h1 class="font-weight-bold py-4">@yield('header')</h1>
       @yield('content')
      </div>
</body>
</html>