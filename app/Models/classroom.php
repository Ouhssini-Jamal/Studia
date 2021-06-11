<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classroom extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'user_id',
        'image',
        'is_public',
        'desc',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function users(){
        return $this->belongsToMany(User::class, 'join_classroom')->wherePivot('valid', 1);
    } 
    public function waiters(){
        return $this->belongsToMany(User::class, 'join_classroom')->wherePivot('valid', 0);
    } 
    public function courses()
    {
        return $this->hasMany(course::class);
    }
    public function posts(){
        return $this->hasMany(post::class);
    }
    public function ratings()
    {
        return $this->hasMany(rating::class);
    }
    public function messages(){
        return $this->hasMany(msg::class);
    }
}
