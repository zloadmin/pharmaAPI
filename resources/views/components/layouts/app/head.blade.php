<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - {{ $title ?? '' }}</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="/hyper/images/favicon.ico">


    <link rel="manifest" href="/hyper/manifest.json" />

    <!-- third party css -->
    <link href="/hyper/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="/hyper/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/hyper/css/app.min.css" rel="stylesheet" type="text/css" />

{{--    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">--}}
{{--    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">--}}
{{--    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">--}}

    @stack('styles')
    @livewireStyles
</head>
