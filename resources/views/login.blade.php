@extends("templates.guest")

@section("auth-form")

        <form class="pico form" action="{{ route('try.login') }}" method="POST">

            @csrf

            <h2>Iniciar Sesión</h2>

            <fieldset>

                <input 
                    type="text"
                    name="name"
                    placeholder="Username"
                    required>

                <input 
                    type="password"
                    name="password"
                    placeholder="Password"
                    required>

                    <input class = "tint-cyan adapt-obj text-bold"
                    type = "submit"
                    name = "login"/>

            </fieldset>

        </form>

@endsection