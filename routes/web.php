<?php
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

Route::post('/tasks',function(Request $request){

    $data = $request->validate([
        'title'=> 'required|max:250',
        'description'=> 'required',
        'long_description'=> 'required',
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();


    return redirect()->route('tasks.index')->with('success','Saved');

})->name('tasks.post');


Route::get('/tasks', function () {
    return view('index', [
        'tasks'=> \App\Models\Task::latest()
    #    ->where('completed', true)
        ->orderBy('id','desc')
        ->get(),
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function($id){

    $task = \App\Models\Task::findOrFail($id);
    if (!$task) {
        return abort(Response::HTTP_NOT_FOUND);
    }
    return  view('show', ['task'=>$task]);
})->name('task.show');

Route::fallback(function(){
    return 'fallback';
});
