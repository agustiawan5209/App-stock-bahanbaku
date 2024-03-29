<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
    <!-- ==== WOW JS ==== -->
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 36px;
            padding: 20px;
        }

        .emoji-404 {

            position: relative;
            animation: mymove 2.5s infinite;
        }

        @keyframes mymove {
            33% {
                top: 0px;
            }

            66% {
                top: 20px;
            }

            100% {
                top: 0px
            }



        }

    </style>
</head>

<body>
    <div class="flex-center position-ref full-height bg-dark">
        <div class="content">
            <div class="title">
                @yield('message')
            </div>
        </div>
    </div>
</body>

</html>
