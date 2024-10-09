@extends('templates/default')

@section('content')

    <!-- Prints all questions -->
    @foreach($survey->questions as $question)

        <form action="" method="POST">

            @csrf

            <label for="question-{{ $question->id }}">

                {{ $question->title }}

            </label>
            
            @switch($question->type)

                @case('text')

                    <input type="text" name="question-{{ $question->id }}" id="question-{{ $question->id }}">

                    @break

                @case('country')

                    <select name="question-{{ $question->id }}" id="question-{{ $question->id }}">

                        @foreach ($countries as $country)

                            <option value="{{ $country->countryID }}">{{ $country->name }}</option>

                        @endforeach
                        
                    </select>

                    @break

                @case('radio-button')

                    @foreach ($question->choices as $choice)

                        <input type="radio" name="question-{{ $question->id }}" id="choice-{{ $choice->id }}" value="{{ $choice->id }}">

                        <label for="choice-{{ $choice->id }}">{{ $choice->label }}</label>

                        @if($choice->is_other === 1)

                            <input type="text" name="other-{{ $choice->id }}" placeholder="Other">

                        @endif

                    @endforeach

                    @break

                @case('checkBox')
                    @foreach ($question->choices as $choice)

                        <input type="checkbox" name="question-{{ $question->id }}[]" id="choice-{{ $choice->id }}" value="{{ $choice->id }}">

                        <label for="choice-{{ $choice->id }}">{{ $choice->label }}</label>

                        @if($choice->is_other === 1)

                            <input type="text" name="other-{{ $choice->id }}" placeholder="Other">

                        @endif

                    @endforeach

                    @break
                    
            @endswitch

        </form>

    @endforeach

@endsection
