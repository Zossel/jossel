<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initialscale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Simple Laravel 11 CRUD Application Tutorial</title>
 <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.
min.css">
 <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrapicons@1.11.1/font/bootstrap-icons.css">
</head>
<body> 
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 <div class="container">
 <a class="navbar-brand" href="{{ route('products.index') }}">Laravel CRUD</a>
 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
 <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse" id="navbarNav">
 <ul class="navbar-nav me-auto">
 <li class="nav-item">
 <a class="nav-link" href="{{ route('products.index') }}">Products</a>
 </li>
 </ul>
 <ul class="navbar-nav">
 @auth
 <li class="nav-item">
 <form action="{{ route('logout') }}" method="POST" class="d-inline">
 @csrf
 <button type="submit" class="btn btn-link nav-link">Logout</button>
 </form>
 </li>
 @else
 <li class="nav-item">
 <a class="nav-link" href="{{ route('login') }}">Login</a>
 </li>
 @endauth
 </ul>
 </div>
 </div>
 </nav>

 <div class="container mt-4">
 <h3 class=" mt-3">Simple Laravel 11 CRUD Application 
Tutorial</h3>
 @yield('content')
 <div class="row justify-content-center text-center mt-3">
 <div class="col-md-12">
<p>
Return to Website: <a
href="https://www.usjr.edu.ph/"><strong>University of San Jose -
Recoletos</strong></a>
</p>
 
 </div>
 </div>
 </div>
<script 
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bu
ndle.min.js"></script>
@stack('scripts')
</body>
</html>