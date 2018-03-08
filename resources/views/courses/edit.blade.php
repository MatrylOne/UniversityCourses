@extends('template.master')

@section('title', 'Edytowanie kursu')

@section('description', 'Wpisz poprawione informacje dotyczące kursu')

@section('content')
    <form method="post" action="{{action('CourseController@update', $course)}}">
        @csrf
        {{ method_field('PATCH') }}
        <div class="form-group">
            <label for="name">Nazwa</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$course->name}}" placeholder="Nazwa kursu">
        </div>
        <div class="form-group">
            <label for="description">Opis</label>
            <input type="text" class="form-control" id="description" name="description" value="{{$course->description}}" placeholder="Krótki opis kursu">
        </div>
        <button type="submit" class="btn btn-primary">Zapisz</button>
    </form>
@endsection