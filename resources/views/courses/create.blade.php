@extends('template.master')

@section('title', 'Tworenie kursu')

@section('description', 'Wpisz informacje o nowym kursie.')

@section('content')
    <form method="post" action="{{action('CourseController@store')}}">
        @csrf
        <div class="form-group">
            <label for="name">Nazwa</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nazwa kursu">
        </div>
        <div class="form-group">
            <label for="description">Opis</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Krótki opis kursu">
        </div>
        <button type="submit" class="btn btn-primary">Stwórz</button>
    </form>
@endsection