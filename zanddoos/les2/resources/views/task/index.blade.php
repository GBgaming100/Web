@extends('layouts.app')

@section('content')
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
     @foreach ($tasks as $task)
        <tr>
            <th scope="row">{{ $task->id }}</th>
            <td>{{ $task->title }}</td>
            <td>{{ $task->description }}</td>
        </tr>
    @endforeach
  </tbody>
</table>

@endsection