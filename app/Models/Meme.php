<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Vote;
class Meme extends Model
{
    use HasFactory;
    protected $table = 'memes';
    protected $fillable = [
        'user_id',
        'title',
        'category',
        'vote_count',
        'comment_count',
        'file_patch',
    ];
    
    public function user() {
        return $this->belongsTo(User::class,);
    }
    public function votes() {
        return $this->hasMany(Vote::class,);
    }   
}
