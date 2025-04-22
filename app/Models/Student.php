<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'major_id',
        'user_id',
        'title',
        'gender',
        'address',
        'phone',
        'photo',
        'is_active',
    ];

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
