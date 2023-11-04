<?php
use App\Http\Requests\TaskRequest;
use App\Models\Task;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::view('/tasks/create', 'create')->name('tasks.create');

Route::post('/tasks',function(TaskRequest $request){

   /*  $data = $request->validated();
    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save(); */

    $task =  Task::create($request->validated());

    return redirect()->route('tasks.index')->with('success','Task Saved Successfully');

})->name('tasks.post');


Route::put('/tasks/{task}',function(Task $task,TaskRequest $request){

   /*  $data = $request->validated();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save(); */

    $task->update($request->validated());
    return redirect()->route('tasks.index')->with('success','Task Updated Successfully');

})->name('tasks.update');


Route::put('/tasks/{task}/toggle-complete', function (Task $task) {
   // dd($task);
    $task->toggleComplete();
    return redirect()->route('task.show', ['task'=>$task])->with('success','Task Updated Successfully');

 })->name('tasks.toggle-complete');


Route::get('/tasks/{task}/edit', function(Task $task){

    if (!$task) {
        return abort(Response::HTTP_NOT_FOUND);
    }
    return  view('edit', ['task'=>$task]);
})->name('task.edit');


Route::get('/tasks', function () {
    return view('index', [
        'tasks'=> \App\Models\Task::latest()
    #    ->where('completed', true)
        ->orderBy('id','desc')
        ->paginate(5)
    ]);
})->name('tasks.index');

Route::get('/tasks/{task}', function(Task $task){

    if (!$task) {
        return abort(Response::HTTP_NOT_FOUND);
    }
    return  view('show', ['task'=>$task]);
})->name('task.show');

Route::delete(
    '/tasks/{task}',
    function (Task $task) {
        $task->delete();
        return redirect()->route('tasks.index')->with('success','The task has been deleted successfully.');
}
)->name('tasks.delete');


Route::fallback(function(){
    return 'fallback';
});
