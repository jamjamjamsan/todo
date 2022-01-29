<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $items = Todo::all();
        return view("index", ["items" => $items]);
    }
    public function create(Request $request)
    {
        //$this->validate($request,Todo::$rules);
        $form = $request->all();
        
        Todo::create($form);
        
        return redirect("/");
    }
    public function update(Request $request,Todo $todo)
    {
        
        $this->validate($request,Todo::$rules);
        $form = $request->all();
        //$todo = Todo::find($todo->content);
        
        unset($form["_token"]);
        $todo->content = $request->content;
        $todo->save();
        //Todo::where("id",$request->id)->update($form);
        return redirect("/");
    }
    public function delete(Request $request,Todo $todo)
    {
        
        Todo::find($todo->id)->delete();
        return redirect("/");
    }
}
