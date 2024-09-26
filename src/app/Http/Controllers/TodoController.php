<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodoController extends Controller
{
    private $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function index()
    {
        $todos = $this->todo->all();//allメソッドで全件取得→返り値：配列捜査に特化したcollectionインスタンス

        return view('todo.index', ['todos' => $todos]);//controller→bladeへデータを渡す
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();//個別ではなく一括で取得

        $this->todo->fill($inputs);//todoインスタンスの各プロパティに一括代入
        $this->todo->save();//saveメソッドでDBに保存(INSERT文)

        return redirect()->route('todo.index');//リダイレクト
    }

    public function show($id)//route関数の第二引数に渡されたルートパラメータを$idという変数で引数に渡している
    {
        $todo = $this->todo->find($id);//findメソッドで指定のidデータを取得

        return view('todo.show', ['todo' => $todo]);
    }

    // TODO: ルートパラメータを引数に受け取る
    public function edit($id)
    {
        // TODO: 編集対象のレコードの情報を持つTodoモデルのインスタンスを取得
        $todo =$this->todo->find($id);

        return view('todo.edit', ['todo' => $todo]);
    }

}
