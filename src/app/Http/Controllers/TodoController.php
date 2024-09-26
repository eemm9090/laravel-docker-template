<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;

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

    public function store(TodoRequest $request)
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
        $todo = $this->todo->find($id);

        return view('todo.edit', ['todo' => $todo]);
    }

    public function update(TodoRequest $request, $id) // 第1引数: リクエスト情報の取得　第2引数: ルートパラメータの取得
    {
        // TODO: リクエストされた値を取得
        $inputs = $request->all();
        // TODO: 更新対象のデータを取得
        $todo = $this->todo->find($id);
        // TODO: 更新したい値の代入とUPDATE文の実行
        $todo->fill($inputs);
        $todo->save();

        return redirect()->route('todo.show', $todo->id);
    }
}
