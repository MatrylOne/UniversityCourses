@extends('template.master')

@section('title', 'Studenci')

@section('description', 'Lista wszystkich studentów z naszej uczelni')

@section('content')
    <div class="row float-right mb-5"><a href="{{action('StudentController@create')}}" class="btn btn-secondary">+</a></div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Imię</th>
            <th scope="col">Nazwisko</th>
            <th scope="col">Kurs</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
    @foreach($students as $key=>$student)
        <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$student->firstName}}</td>
            <td>{{$student->lastName}}</td>
            <td>
                @if($student->course != null)
                {{$student->course->name}}
                @endif
            </td>
            <td class="float-right">
                <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Więcej
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{action('StudentController@show', $student)}}">Szczegóły</a>
                        <a class="dropdown-item" href="{{action('StudentController@edit', $student)}}">Edycja</a>
                        <a class="dropdown-item" href="{{action('StudentController@courses', $student)}}">Zapisz na kurs</a>
                        <form method="post" action="{{action('StudentController@destroy', $student)}}">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="dropdown-item">Usuń</button>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
        </tbody>
    </table>
@endsection