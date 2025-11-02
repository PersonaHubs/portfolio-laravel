<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Portfolio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Mincho&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Baloo+2:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="
  {{ request()->routeIs('projects') ? 'projects-page' : '' }}
  {{ request()->routeIs('skills') ? 'skills-page' : '' }}
  {{ request()->routeIs('contact') ? 'contact-page' : '' }}
">

  {{-- Header --}}
<nav class="
  {{ request()->routeIs('projects') ? 'projects-header' : '' }}
  {{ request()->routeIs('skills') ? 'skills-header' : '' }}
  {{ request()->routeIs('contact') ? 'contact-header' : '' }}
">
  <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>
  <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'active' : '' }}">Projects</a>
  <a href="{{ route('skills') }}" class="{{ request()->routeIs('skills') ? 'active' : '' }}">Skills</a>
  <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
</nav>

    <main>
        @yield('content')
    </main>

<footer class="
  {{ request()->routeIs('projects') ? 'projects-footer' : '' }}
  {{ request()->routeIs('skills') ? 'skills-footer' : '' }}
  {{ request()->routeIs('contact') ? 'contact-footer' : '' }}
">
  <p>&copy; {{ date('Y') }} My Portfolio. All rights reserved.</p>
</footer>
    
</body>
</html>
