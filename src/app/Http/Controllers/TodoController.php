<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        $todos = $todo->all();

        return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all(); // 変更

        $todo = new Todo();
        $todo->user_id = Auth::id(); // ログインしている攻撃者のユーザID：2を代入
        $todo->fill($inputs);
        // $todo->content = '犯行予告など悪意のある投稿';
        // $fillableで許可していないため被害者のユーザID：1は再代入されない
        $todo->save();

        return redirect()->route('todo.index');
    }
    
}
