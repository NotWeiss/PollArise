@extends('templates.dashboard')

@section('content')

        @foreach ($surveys as $survey)

            <form 
                action="{{ route('survey.open', ['survey' => 
                           $survey->surveyID]) }}" 
                method="POST">

                @csrf

                <button class="survey">
                
                    <div style="background-color: whitesmoke">
                        
                        <img src="">
            
                    </div>
            
                    <div class="down">
                        
                        <h3>{{$survey['title']}}</h3>
            
                    </div>
                    
                </button>

            </form>
            
        @endforeach

        <form action="{{ route('survey.create') }}" method="POST">

        @csrf

        <button class="survey">
        
            <div style="background-color: whitesmoke">
                
                <img src="">
    
            </div>
    
            <div class="down">
                
                <input 
                    type="text" 
                    name="title"
                    placeholder="New Survey"
                    onclick="doSomething()"
                    onkeyup="event.preventDefault()"
                    required>
    
            </div>
    
        </button>

    </form>



@endsection