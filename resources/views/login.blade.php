@extends("templates.guest")

@section("auth-form")

        <form class="pico form" action="">

            <h2>Iniciar Sesión</h2>

            <fieldset>

                <input 
                    type="text"
                    name="email"
                    placeholder="E-Mail"
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