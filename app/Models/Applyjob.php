<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applyjob extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
    ];

    public function jobpost()
    {
        return $this->belongsTo(Jobpost::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
