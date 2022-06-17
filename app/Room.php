<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Chat;
use App\Post;

class Room extends Model
{
    /**
     * このルームが所有するチャット一覧（ Chatモデルとの1対多の関係を定義）
     */
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
    
    /**
     * このルームを所有する投稿（Postモデルとの多対1の関係を定義）
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
