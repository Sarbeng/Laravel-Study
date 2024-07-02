@extends('layouts.app')

@section('title',isset($task) ? 'Edit Task' : 'Add Task')


@section('content')
   
    <form method="POST", action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store')}}"> 
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-4">
            <label for="'title" >
                Title
            </label>
            <input type="text" name="title" id="title"
            class="border @error('title') border-red-500 @enderror"
             value="{{ $task->title ?? old('title')}}"/>
            @error('title')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <lable for="description">
                Description
            </lable>
            <textarea  name="description" id="description" rows="5"   class="border @error('description') border-red-500 @enderror">
                {{ $task->description ?? old('description')}}
            </textarea>
            @error('description')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <lable for="long_description">
               Long Description
            </lable>
            <textarea  class="border @error('long_description') border-red-500 @enderror" name="long_description" id="long_description" rows="10">
                {{$task->long_description ?? old('long_description')}}
            </textarea>
            @error('long_description')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
       <div class="flex gap-2 items-center">
       <button type="submit" class="btn">
            @isset($task)
                Edit Task
            @else
                Add Task
            @endisset
        </button>
        <a href="{{route('tasks.index')}}" class="link">Cancel</a>
       </div>
    </form>

@endsection