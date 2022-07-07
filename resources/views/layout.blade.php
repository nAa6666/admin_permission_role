<!DOCTYPE html>
<html lang="{{\config('app.locale')}}" prefix="og: http://ogp.me/ns#">
    <head>
        <meta charset="utf-8">
        {!! SEOMeta::generate() !!}
        {!! OpenGraph::generate() !!}
        <meta property="og:site_name" content="sweet.tv">
        <meta name="robots" content="@yield('robots', 'index, follow')" />
        <meta name="csrf-token" content="{{csrf_token()}}">
        <meta name="yandex-verification" content="1d0a176068f8f746" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no">
        <meta name="application-name" content="@lang('index.title')">
        <meta name="theme-color" content="#009EE2">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
        <link rel="canonical" href="{{url()->current()}}" />
        {{--<link rel="stylesheet" href="{{ asset('css/main.css') }}">--}}
        @stack('css')
        @php
            if(isset($customSlug)){
                $lang = HeaderAPI::Slug($customSlug[0], $customSlug[1], (empty($customSlug[2]) ? null : $customSlug[2]));
            }
            else{
                $lang = HeaderAPI::Slug();
            }
        @endphp
    </head>
    <body>
        @include('header')
        <section id="main">
            @yield('content')
        </section>
        @include('footer')
        <script defer src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script defer src="{{ asset('js/script.js') }}"></script>
        @stack('scripts')
    </body>
</html>
