@extends('template.master')

@section('title', 'Nowy student')

@section('description', 'Wpisz informacje o nowym studencie.')

@section('content')
    <form method="post" action="{{action('StudentController@store')}}">
        @csrf
        <div class="form-group">
            <label for="firstName">Imię</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Wpisz imię">
        </div>
        <div class="form-group">
            <label for="lastName">Nazwisko</label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Wpisz nazwisko">
        </div>
        <button type="submit" class="btn btn-primary">Stwórz</button>
    </form>
@endsection