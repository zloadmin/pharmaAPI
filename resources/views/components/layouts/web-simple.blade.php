<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.layouts.web.head')
<body>
{{ $slot }}
@include('components.layouts.web.scripts')
</body>
</html>