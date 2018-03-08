@extends('template.master')

@section('title', 'Dane studenta')

@section('description', 'Pełne dane wybranego studenta.')

@section('content')
    <h3>{{$student->firstName." ".$student->lastName}}</h3>
    @if($student->course != null)
        <div class="row">
            <div class="col">
                <h2>{{$student->course->name}}</h2>
                <p>{{$student->course->description}}</p>
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
            @foreach($student->course->students as $key=>$student)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$student->firstName}}</td>
                    <td>{{$student->lastName}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection