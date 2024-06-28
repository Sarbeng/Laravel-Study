

@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
<div>
    <nav class="mb-4">
        <a class="link" href="{{route('tasks.create')}}">Add Task!</a>
    </nav>
    <!-- @if (count($tasks)) -->
    <!-- the forelse is used when we need to combine an if clause and and a for loop -->
    @forelse ( $tasks as $task )
        <!-- <div>{{$task->title}}</div> -->
        <a href="{{route('tasks.show',['task' => $task->id])}}" 
        @class(['line-through' => $task->completed])>{{$task->title}}</a>
    @empty
        <div>There are no tasks</div>  
    @endforelse 
        
    <!-- @endif -->

    @if ($tasks->count())
        {{$tasks->links()}}
    @endif
</div>
@endsection
