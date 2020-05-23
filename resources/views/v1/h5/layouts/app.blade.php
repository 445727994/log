{{--/**--}}
{{-- * Created by yhc<445727994@qq.com>--}}
{{-- * Author: 萤火虫--}}
{{-- * Date: 2020/1/21--}}
{{-- * Time: 10:36--}}
{{-- */--}}
<html>
    <head>
        <title>@yield('title','萤火淘客')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui"/>
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
        <meta name="format-detection" content="telephone=no, email=no"/>
        <meta charset="UTF-8">
        <title>@yield('title','萤火淘客')</title>
        <link rel="stylesheet" href="{{ URL::asset('themes/css/core.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('themes/css/icon.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('themes/css/home.css') }}?version=1.0">
        <link rel="icon" type="image/x-icon" href="{{ URL::asset('favicon.ico') }}">
        <link href="{{ URL::asset('iTunesArtwork@2x.png') }}" sizes="114x114" rel="apple-touch-icon-precomposed">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://cdn.bootcss.com/jquery/3.5.0/jquery.min.js"></script>
        <script src="{{ URL::asset('/layui/layui.js') }}"></script>
        <script src="{{URL::asset('/layui/ajaxYhc.js')}}?time=22"></script>
    </head>
    <body style="background:#eee">
        @yield('content')
    </body>
</html>
