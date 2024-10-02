@extends('templates.dashboard')

@section('content')

    <form action="">

        <input 
            type="text"
            name="title"
            placeholder="{{$survey['title']}}">

        <input type="text"
            name="description"
            placeholder="{{$survey['description']}}">    

        <h3>Preguntas:</h3>
    
    @foreach ($questions as $question)


        <input 
        type="text"
        name="title"
        placeholder="{{$question['prompt']}}">

        <input 
        type="text"
        name="title"
        placeholder="{{$question['type']}}">

    @endforeach

        <button><a href="">Agregar Nueva Pregunta</a></button>

    </form>

@endsection