<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'media',
        'user_id',
        'classroom_id',
        'ext',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function classroom()
    {
        return $this->belongsTo(classroom::class);
    }
    public function comments(){
        return $this->hasMany(comment::class)->where('parent_id',null);
    }
}
