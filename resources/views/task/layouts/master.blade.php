<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laravel 10 Task List App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('styles')
  </head>
  
 
  <body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="mb-4 text-2xl">@yield('title')</h1>
    <div>
        @if (session()->has('success'))
        <div style="color: green">{{ session('success') }}</div>
    @endif
    
        @yield('content')
    </div>
  </body>

 

</html>

