<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class CommentVote extends Model
{
    use HasFactory;
    protected $table = 'comment_vote';
    protected $fillable = [
        'user_id',
        'comment_id',
        'meme_id',
        'is',
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }

}
