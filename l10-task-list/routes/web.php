<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;


Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// to access variables outside anonymous functions you need to use the use statement to add them
Route::get('/tasks', function () {
    return view('index',[

        // 'tasks' => Task::latest()->where('completed',true)->get()
        'tasks' => Task::latest()->paginate(10)
        
    ]);
})->name('tasks.index');

Route::view('/tasks/create','create')->name('tasks.create');

Route::get('/tasks/{task}/edit',function( Task $task) {
  return view('edit',[
   'task' => $task
  ]);
})->name('tasks.edit');

// Route for displaying one single task
Route::get('/tasks/{task}',function(Task $task) {
   
   return view('show',[
    'task'=> $task
   ]);
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request, Task $task) {

  $task = Task::create($request->validated());

  return redirect()->route('tasks.show',['task' => $task->id])
    ->with('success','Task created successfully');
})->name('tasks.store');

Route::put('/tasks/{task}', function (TaskRequest $request, Task $task) {
 
  $task->update($request->validated());

  return redirect()->route('tasks.show',['task' => $task->id])
    ->with('success','Task updated successfully');
})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task) {
  $task->delete();

  return redirect()->route('tasks.index')
    ->with('success', 'Task Deleted Successfully');
})->name('tasks.destroy');

Route::put('tasks/{task}/toggle-complete', function (Task $task) {
// toggleComplete is from the Task model. 
    $task->toggleComplete();

    return redirect()->back()->with('success','Task updated successfully');
} )->name('tasks.toggle-complete');

Route::get('/heo',function() {
    return 'hello';
})->name('hello');

Route::get('/hallo',function(){
    return redirect()->route('hello');
});

Route::get('/greet/{name}',function($name){
    return 'Hello' . $name . '!';
});

Route::fallback(function(){
    return 'Still got somewhere';
});

