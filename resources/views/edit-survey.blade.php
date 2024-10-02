@extends('templates.dashboard')

@section('content')
    <div class="container">
        <h1>Edit Survey</h1>

        <!-- Update Survey Title and Description -->
        <form action="{{ route('update.survey', $survey) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Survey Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $survey->title }}">
            </div>

            <div class="form-group">
                <label for="description">Survey Description</label>
                <textarea name="description" id="description" class="form-control">{{ $survey->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Survey</button>
        </form>

        <hr>

        <!-- Questions -->
        <h2>Questions</h2>

        @if ($survey->questions && $survey->questions->count())

            @foreach ($questions as $question)
                <form action="{{ route('update.questions', [$survey, $question]) }}" method="POST" class="mb-4">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="text{{ $question->id }}">Question {{ $loop->iteration }}</label>
                        <input type="text" name="prompt" class="form-control" value="{{ $question->prompt }}">
                        
                        <div style="display:flex;">
                            <input type="radio" id="text" name="type" value="text">
                            <label for="text">TEXT</label><br>
                            
                            <input type="radio" id="country" name="type" value="country">
                            <label for="country">COUNTRY</label><br>
                            
                            <input type="radio" id="rad" name="type" value="radio_button">
                            <label for="rad">RADIO BUTTON</label><br>

                            <input type="radio" id="chk" name="type" value="checkbox">
                            <label for="chk">CHECKBOX</label><br>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Update Question</button>

                </form>

                
                    <!-- choice -->
                <form action="">
                    @csrf

                </form>
                    

                <!-- Add New Choice -->
                    
                <form action="{{ route('create.choice', ['survey' => $survey->surveyID, 'question' => $question->questionID]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <button type="submit" class="new_choice">Add New Choice</button>
                    </div>
                </form>
                    

                    

                <form action="{{ route('destroy.questions', [$survey->surveyID, $question->questionID]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <button type="delete" class="btn btn-primary">Borrar Pregunta</button>

                </form>
                

            @endforeach

        @endif

        <!-- Add New Question -->
        <form action="{{ route('create.question', $survey) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Add Question</button>
        </form>
    </div>
@endsection