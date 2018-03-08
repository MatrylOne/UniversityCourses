@extends('template.master')

@section('title', 'Edycja studenta')

@section('description', 'Wpisz poprawione informacje dotyczące studenta.')

@section('content')
    <form method="post" action="{{action('StudentController@update', $student)}}">
        @csrf
        {{ method_field('PATCH') }}
        <div class="form-group">
            <label for="firstName">Imię</label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="{{$student->firstName}}" placeholder="Wpisz imię">
        </div>
        <div class="form-group">
            <label for="lastName">Nazwisko</label>
            <input type="text" class="form-control" id="lastName" name="lastName" value="{{$student->lastName}}" placeholder="Wpisz nazwisko">
        </div>
        <button type="submit" class="btn btn-primary">Zapisz</button>
    </form>
@endsection