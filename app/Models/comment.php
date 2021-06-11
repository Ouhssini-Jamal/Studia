<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'user_id',
        'post_id',
        'parent_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function post()
    {
        return $this->belongsTo(post::class);
    }
    public function replies()
    {
        return $this->hasmany(comment::class,'parent_id');
    }
}
