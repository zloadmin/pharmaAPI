<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.layouts.app.head')
<body>
<main role="main" class="container">
    {{ $slot }}
</main><!-- /.container -->
</body>
<body>

@include('components.layouts.app.scripts')
</body>
</html>
