@extends('templates/default')

@section('content')

    @foreach($survey->questions as $question)

        <form action="">

            <label for="">
                {{ $question->title }}
            </label>
            
            @if ($question->type === 'text')

                <input type="text">

            @elseif ($question->type === 'country')

                <select name="" id=""></select>

            @elseif ($question->type === 'radio_button')

                @foreach ($question->choices as $choice)

                    <input type="radio" name="option" id="">

                    @if ($choice->is_other === 1)

                        <input type="text">
                        
                    @endif

                @endforeach

            @elseif ($question->type === 'checkBox')

                @foreach ($question->choices as $choice)

                    <input type="radio" name="option" id="">

                    @if ($choice->is_other === 1)

                        <input type="text">
                        
                    @endif

                @endforeach

            @endif

        </form>

    @endforeach

@endsection