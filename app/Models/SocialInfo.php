<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'vk',
        'tg',
    ];
}
