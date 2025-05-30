<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','FoodHelper')</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
  @yield('content')
</body>
</html>
