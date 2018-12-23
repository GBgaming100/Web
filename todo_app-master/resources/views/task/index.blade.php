@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">Description</th>
                <th scope="col">Edit</th>
                <th scope="col">Details</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td><a href=" {{route('task.edit', $task->id)}}" class="btn btn-primary">Edit</a></td>
                    <td><a href=" {{route('task.show', $task->id)}}" class="btn btn-secondary">Details</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection