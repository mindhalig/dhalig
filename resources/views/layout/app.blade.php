<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'My App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
    .main-content {
      min-height: calc(100vh - 56px);
      position: relative;
    }
    .footer {
      position: fixed;
      bottom: 0;
      width: 100%;
    }
  </style>    


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="col-md-9 col-lg-10">
  <a class="navbar-brand" href="#"></a>
  </div>
</nav>
<div class="container-fluid">
  <div class="row">
    @include('layout.sidebar')
            <div class="col-md-9 col-lg-10">
                @yield('content')
            </div>
    </div>
</div>
</body>
</html>
