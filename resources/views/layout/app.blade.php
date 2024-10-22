<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset("assets/css/main.css")}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="{{asset('assets/all.min.css')}}">
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route("home")}}"> Home </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item  mx-4">
            <a class="nav-link active" aria-current="page" href="{{route("category.index")}}">Category</a>
          </li>

          <li class="nav-item  mx-4">
            <a class="nav-link active" aria-current="page" href="{{route("product.index")}}">Product</a>
          </li>

          <li class="nav-item  mx-4">
            <a class="nav-link active" aria-current="page" href="{{route("customer.index")}}">Customer</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
  <main id="main">
    @yield("content")
  </main>

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>