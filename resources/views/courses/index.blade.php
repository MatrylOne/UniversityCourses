@extends('template.master')

@section('title', 'Kursy')

@section('description', 'Wykaz wszystkich kursów, oraz ich uczestników.')

@section('content')
    <div class="row float-right mb-5"><a href="{{action('CourseController@create')}}" class="btn btn-secondary">+</a></div>
    @foreach($courses as $key=>$course)
            <div class="row">
                <div class="col">
                    <h2>{{$course->name}}</h2>
                    <p>{{$course->description}}</p>
                </div>
                <div class="col">
                    <form action="{{action('CourseController@destroy', $course)}}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <a href="{{action('CourseController@edit', $course)}}" class="btn btn-secondary">Edytuj</a>
                                <button type="submit" class="btn btn-secondary">Usuń</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table mb-5">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imię</th>
                    <th scope="col">Nazwisko</th>
                </tr>
                </thead>
                <tbody>
                @foreach($course->students as $key=>$student)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$student->firstName}}</td>
                        <td>{{$student->lastName}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endforeach
@endsection