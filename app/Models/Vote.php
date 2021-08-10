<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'meme_id'
    ];

    public function meme() {
        return $this->belongsTo(Meme::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
