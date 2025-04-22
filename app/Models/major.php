<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class major extends Model
{
    protected $fillable = [
        'name',
        'is_active'
    ];


    public function users()
    {
        return $this->belongsToMany(User::class, 'majors_detail', 'majors_id', 'user_id');
    }
}
