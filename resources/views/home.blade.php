@extends('templates.dashboard')

@section('content')

    <form action="{{ route('create.survey') }}">

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
                    required>
    
            </div>
    
        </button>

    </form>



@endsection