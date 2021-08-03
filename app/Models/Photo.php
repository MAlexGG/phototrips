<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'photo',
        'continent',
        'country',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
