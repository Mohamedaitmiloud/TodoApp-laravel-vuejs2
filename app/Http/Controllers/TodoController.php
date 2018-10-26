<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Todo;

class TodoController extends Controller
{


    public function __construct(){
        $this->middleware('auth');
    }

    //return view 
    public function index(){
        return view('todos.todos');
    }

    //get all users todos items
    public function getData(){
        $userName  = Auth::user()->name;
        $todos = Auth::user()->todos()->orderBy('created_at','desc')->get();
        return response()->json(['etat'=>true,'todos'=>$todos,'user'=>$userName]);
        
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

    // change name

    public function changeName(Request $request){
        $user = Auth::user();
        $user->name = $request->name;
        $user->save();
        
        return response()->json(['etat'=>true,'name'=>Auth::user()->name]);
        
    }
}
