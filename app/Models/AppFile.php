<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppFile extends Model
{
    use HasFactory;

    const APP_IMAGES_PATH = 'images';

    protected $fillable = [
        'user_id',
        'name',
        'path',
        'location',
        'extension'
    ];

}
