<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;

    protected $table = 'todos';
    //マッピングし、クラスメソッドを用いることでDBとのやり取りができるようにしている
    //→ORM(laravelではエロクエントを持ちいている)

    protected $fillable = [//fillメソッドで一括代入する項目に制限をかけることで、意図しないデータの更新を防ぐ
        'content',
    ];

}
