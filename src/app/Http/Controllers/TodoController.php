<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();//todoモデルをインスタンス化
        $todos = $todo->all();//allメソッドで全件取得→返り値：配列捜査に特化したcollectionインスタンス

        return view('todo.index', ['todos' => $todos]);//controller→bladeへデータを渡す
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();//個別ではなく一括で取得

        $todo = new Todo();
        $todo->fill($inputs);//todoインスタンスの各プロパティに一括代入
        $todo->save();//saveメソッドでDBに保存(INSERT文)

        return redirect()->route('todo.index');//リダイレクト
    }

    public function show($id)//route関数の第二引数に渡されたルートパラメータを$idという変数で引数に渡している
    {
        $model = new Todo();
        $todo = $model->find($id);//findメソッドで指定のidデータを取得

        return view('todo.show', ['todo' => $todo]);
    }

}
