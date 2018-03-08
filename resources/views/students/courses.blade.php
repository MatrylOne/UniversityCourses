@extends('template.master')

@section('title', 'Nowy student')

@section('description', 'Wpisz informacje o nowym studencie.')

@section('content')
    @if($courses != null)
    <form method="post" action="{{action('StudentController@assignCourse', $student)}}">
        @csrf
        <div class="form-group">
            <label for="courses">Kurs</label>
            <select name="course_id" id="courses" class="form-control form-control-lg">
                @foreach($courses as $course)
                    <option value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
                    <option value="-1">Wypisz studenta</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Przydziel</button>
    </form>
    @else
        <h4>Brak kursów w systemie</h4>
    @endif
@endsection