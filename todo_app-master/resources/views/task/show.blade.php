@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card " style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Task: {{$task->title}}</h5>
                <p class="card-text">{{$task->description}}</p>
                <a href="{{route('task.index')}}" class="btn btn-primary">Task list</a>
                <form action="{{route('task.destroy', $task->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="delete">
                </form>
            </div>
        </div>
    </div>
    @endsection