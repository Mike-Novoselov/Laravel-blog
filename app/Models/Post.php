<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $testsEnubody;

    protected $table = 'posts';


//    нужно для разрешения добавления в б\д
    protected $guarded = [];
//    protected $guarded = false; тоже самое что и "protected $guarded = [];"

/**    или так разрешать добавление в бд, но нужно перечислять все названия стольбцов
    protected $fillable = ['title', 'content)'];
**/
}
