@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POSt" action="{{ route('task.update' ,$task->id)}}">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{$task['title']}}">
                <small id="emailHelp" class="form-text text-muted">Fill in a usefull name</small>
            </div>

            <div class="form-group">
                <label for="title">Description</label>
                <input type="text" name="description" class="form-control" id="description" value="{{$task['description']}}">
                <small id="emailHelp" class="form-text text-muted">Try to make this so clear possibless</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
