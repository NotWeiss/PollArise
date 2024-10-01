@extends('templates.default')

@section("content")

</head>

<body style="height: 100%" data-theme = "light">
    
    <div class="backdrop"></div>

    <div class="content2">

        <div class="title2">

            <img src = "">
            <h1><a href="{{ route('landing') }}">PollArise</a></h1>

        </div>

        @yield("auth-form")

    </div>

    @endsection