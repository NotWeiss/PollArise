@extends("templates.default")

@section("content")

</head>

<body style="height: 100%" data-theme = "light">

    <main class = "vessel-row">

        <div class = "side" id = "left" style = "flex: 66%;">

            <img class = "background" src = "{{ asset('assets/wallpaper.jpg') }}">

        </div>

        <div class = "side" id= "right" style = "flex: 33%; background-color: rgb(235, 224, 213)">

                <nav class = "nav-hor">

                        <a class = "nav-element" href="{{ route('login') }}">
                            <h3>Iniciar Sesión</h3>
                        </a> 

                        <a class = "nav-element" href="{{ route('register') }}">
                            <h3>Registrarse</h3>
                        </a> 

                </nav>

            <div class = "content">

                <div class="title">

                    <img src = "">
                    <h1>PollArise</h1>

                </div>

                <form class="pico reduce-margin-bottom" action = ""> <!--TODO: ADD ACTION SEARCH SURVEY-->

                    <fieldset>

                        <input 
                            type = "text adapt-obj" 
                            name = "surveyID" 
                            placeholder = "ID de la Encuesta"
                            required/>

                        <input class = "tint-cyan adapt-obj text-bold"
                            type = "submit"
                            name = "search"/>

                    </fieldset>

                </form>

                <div class = "controls">

                    <p style = "margin-right: 10px">¿Te Gustaría Crear Una Encuesta?</p>
                    <a href="{{ route('register') }}">¡Registrate!</a>

                </div>
                <div class = "controls">

                    <p style = "margin-right: 10px">¿Ya Tienes Una Cuenta?</p>
                    <a href="{{ route('login') }}">¡Inicia Sesión!</a>

                </div>

            </div>

        </div>

    </main>
    
@endsection