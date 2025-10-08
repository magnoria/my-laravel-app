<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // 이 필드들에 데이터를 한 번에 대량 할당(Mass Assignment)하는 것을 허용합니다.
    protected $fillable = [
        'title',
        'content',
        'author',
    ];
}
