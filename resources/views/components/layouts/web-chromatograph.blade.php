<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.layouts.web.head')
<body x-data="{ isVisibleMenu: false }">
<div class="wrap">
    <div class="main">
        <section class="software">
            {{ $slot }}
        </section>
    </div>

</div>
@include('components.layouts.web.scripts')
</body>
</html>