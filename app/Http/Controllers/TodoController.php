<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Todo;

class TodoController extends Controller
{

    //return view 
    public function index(){
        return view('todos.todos');
    }

    //get all users todos items
    public function getData(){
        $todos = Auth::user()->todos()->orderBy('created_at','desc')->get();
        return response()->json(['etat'=>true,'todos'=>$todos]);
        
    }

    //add a new todo item
    public function addTodo(Request $request){
        $todo = new Todo();
        $todo->user_id = Auth::user()->id;
        $todo->todo = $request->todo;
        $todo->save();
        return response()->json(['etat'=>true,'id'=>$todo->id]);
        
    }

    //mark a todo item completed
    public function markCompleted($id){
        $todo = Todo::find($id);
        $todo->is_completed = 1;
        $todo->save();
        return response()->json(['etat'=>true,'id'=>$id]);
        
    }

    //delete todo item

    public function deleteTodo($id){
        $todo = Todo::find($id);
        $todo->delete();
        
        return response()->json(['etat'=>true]);
        
    }
}
