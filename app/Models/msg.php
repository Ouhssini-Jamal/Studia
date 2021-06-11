<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class msg extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'user_id',
        'classroom_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function classroom()
    {
        return $this->belongsTo(classroom::class);
    }
    
}
