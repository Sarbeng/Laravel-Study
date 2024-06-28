
@extends('layouts.app')

@section('title',$task->title)

@section('content')
<div class="mb-4">
        <a class="link" href="{{route('tasks.index')}}"><- Go Back to the task list!</a>
</div>
    <!-- <h1>{{$task->title}}</h> -->
    <p class="text-slate-700 mb-4">{{$task->description}}</p>

    @if ($task->long_description)
        <p class="text-slate-700 mb-4">{{$task->long_description}}</p>
    @endif

    <p class="mb-5 text-slate-500 text-sm">Created {{$task->created_at->diffForHumans()}} • Updated {{$task->updated_at->diffForHumans()}}</p>
    

    <p>
        @if ($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
           <span class="font-medium text-red-500">Not completed</span> 
        @endif
    </p>

    <div class="flex gap-2 py-2">
        <a href="{{route('tasks.edit',['task' =>$task])}}" class="btn">Edit</a>
    
        <form method="POST" action="{{route('tasks.toggle-complete',['task'=>$task])}}">
            @csrf
            @method('PUT')
            <button type="submit" class="btn">
                Mark as {{$task->completed ? 'not completed' : 'completed'}}
            </button>
        </form>
   
        <form action="{{route('tasks.destroy', ['task' => $task])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Delete</button>
        </form>

    </div>
@endsection