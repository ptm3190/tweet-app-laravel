<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    // Tweetモデル→Userモデル間にリレーションを張る
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
