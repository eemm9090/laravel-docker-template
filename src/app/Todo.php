<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos';
    //マッピングし、クラスメソッドを用いることでDBとのやり取りができるようにしている
    //→ORM(laravelではエロクエントを持ちいている)

    protected $fillable = [//fillメソッドで一括代入する項目に制限をかけることで、意図しないデータの更新を防ぐ
        'content',
    ];

}
