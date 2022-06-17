<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User; // 追加
// use App\Chat;
use App\Room;

class Post extends Model
{
    protected $fillable = ['user_id', 'title', 'content', 'style', 'image',];
    
    /**
     * この投稿を所有するユーザ。（ Userモデルとの多対1の関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    
    
    /**
     * この投稿に紐づいた回答者一覧（中間テーブルを介して取得）
     */
    public function room_users()
    {
        return $this->belongsToMany(User::class, 'rooms', 'post_id', 'user_id')->withTimestamps();
    }
    
    
    // Room
    // ルーム追加
    public function add_room($user_id)
    {
        // 既にルームを作っているの確認
        $exist = $this->is_room_exist($user_id);
    
        if ($exist) {
            // 既にルームがあればしていれば何もしない
            return false;
        } else {
            // ルームがないのであればルームを作る
            $this->room_users()->attach($user_id);
            return true;
        }
    }
    
    // 注目する投稿にそのお店がすでにルームを作っているか判定
    public function is_room_exist($user_id)
    {
        return $this->room_users()->where('user_id', $user_id)->exists();
    }
    
}
