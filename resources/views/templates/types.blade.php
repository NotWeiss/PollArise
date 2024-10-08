<div style="display:flex;">

    <input type="radio" id="text" name="type" value="text" 
        {{ $question->type === 'text' ? 'checked' : '' }}>

    <label for="text">Texto</label><br>
    
    <input type="radio" id="country" name="type" value="country" 
        {{ $question->type === 'text' ? 'checked' : '' }}>

    <label for="country">País</label><br>
    
    <input type="radio" id="rad" name="type" value="radio_button" 
        {{ $question->type === 'text' ? 'checked' : '' }}>

    <label for="rad">Opciones: Unica Selección</label><br>

    <input type="radio" id="chk" name="type" value="checkbox" 
        {{ $question->type === 'text' ? 'checked' : '' }}>

    <label for="chk">Opciones: Multiple Selección</label><br>

</div>