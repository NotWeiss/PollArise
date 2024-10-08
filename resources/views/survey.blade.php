@extends('templates.dashboard')

@section('content')

    <div class="container">

        <div>

            <h4>ID de Encuesta: {{ $survey->surveyID }}</h4>

        </div>

        <h1>DETALLES DE LA ENCUESTA</h1>

        <!-- Form for Editing Survey Details -->
        <form action="{{ route('survey.update', $survey) }}" 
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label for="title">Título de la Encuesta</label>

                <input 
                    type="text" 
                    name="title" 
                    id="title"
                    class="form-control" 
                    value="{{ $survey->title }}">

                <label for="description">Descripción de la Encuesta</label>

                <textarea name="description" id="description" 
                class="form-control">{{ $survey->description }}</textarea>


            </div>

            <button type="submit" class="btn btn-primary">
                Actualizar Detalles de la encuesta
            </button>

        </form>

        <hr>

        <h2>PREGUNTAS</h2>

        @if ($survey->questions->isNotEmpty())

            @foreach ($survey->questions as $question)

                <!--Form for Editing Questions-->
                <div>

                    <!--HERE HERE HERE-->
                    <form 
                        id="question-{{ $question->questionID }}-form"

                        action="{{ route('question.update', ['survey' => $survey, 'question' => $question->questionID]) }}" 
                        
                        method="POST">

                    <!--HERE HERE HERE-->



                    @csrf
                    @method('PUT')
                        
                        <label for="question-{{ $question->questionID }}">
                            Pregunta #{{ $loop->iteration }}
                        </label>

                        <input 
                            type="text" 
                            id="question-{{ $question->questionID }}" 
                            name="prompt" 
                            class="form-control" 
                            value="{{ $question->prompt }}">

                        @include('templates/types')
                        
                    </form>

                    <form
                        id="delete-{{ $question->questionID }}-form" 
                        action="{{ route('question.destroy', [
                                'survey' => $survey, 'question' => $question->questionID]) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')

                        
                    </form>
            
                    <!-- BUTTONS FOR EACH QUESTION -->
                    <div>

                        <button 
                            type="submit" 
                            class="" 
                            form="question-{{ $question->questionID }}-form">
                            Guardar
                        </button>

                        <button 
                            type="submit" 
                            class="" 
                            form="delete-{{ $question->questionID }}-form">
                            Borrar
                        </button>

                    </div> 

                </div>

                @if (($question->type === "radio_button" || 
                     $question->type === "checkbox"))

                    <h2>OPCIONES</h2>

                    @if ($question->choices && $question->choices->isNotEmpty())

                        @foreach ($question->choices as $choice)

                            <!--choice-->
                            <div>

                                <!--Form for Editing Choices-->
                                <form
                                id="choice-{{ $choice->choiceID }}-form" 
                                action="{{ route('choice.update', [
                                        'survey' => $survey, 'question' => $question->questionID, 
                                        'choice' => $choice->choiceID]) }}" 
                                method="POST">

                                @csrf
                                @method('PUT')

                                <label for="choice-{{ $choice->choiceID }}">
                                    Opción #{{ $loop->iteration }}
                                </label>
                                
                                <input 
                                    type="text" 
                                    id="choice-{{ $choice->choiceID }}" 
                                    name="text" 
                                    class="form-control" 
                                    value="{{ $choice->text }}">
                                
                                <label for="checked-{{ $choice->choiceID }}">
                                    Agregar Campo de Texto
                                </label>
                                
                                <input 
                                    type="checkbox"
                                    id="checked-{{ $choice->choiceID }}" 
                                    name="is_other" 
                                    value="{{ $choice->is_other }}"
                                    {{ $choice->is_other === 1 ? 'checked' : '' }}
                                >

                                </form>

                                <form
                                    id="destroy-{{ $choice->choiceID }}-form" 
                                    action="{{ route('choice.destroy', [
                                            'survey' => $survey, 'question' => $question->questionID, 
                                            'choice' => $choice->choiceID]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')

                                    
                                </form>

                                <!-- BUTTONS FOR EACH QUESTION -->
                                <div>

                                    <button 
                                        type="submit" 
                                        class="" 
                                        form="choice-{{ $choice->choiceID }}-form">
                                        Guardar
                                    </button>

                                    <button 
                                        type="submit" 
                                        class="" 
                                        form="destroy-{{ $choice->choiceID }}-form">
                                        Borrar
                                    </button>

                                </div>

                            </div>

                        @endforeach

                    @endif

                    <!--Form for Creating Choices-->
                    <form 
                        action="{{ route('choice.create', [
                        'survey' => $survey, 
                        'question' => $question->questionID]) }}" 
                        method="POST">

                        @csrf

                        <button type="submit" class="">
                            Crear Opción
                        </button>

                    </form>
                
                @endif

                <hr>

            @endforeach

        @endif

        <!--Form for Creating Questions-->
        <form action="{{ route('question.create', $survey) }}" 
              method="POST">

            @csrf

            <button type="submit" class="">
                Crear Pregunta
            </button>

        </form>

    </div>

@endsection