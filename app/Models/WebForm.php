<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'locale',
        'content',
        'crm_source',
        'recaptcha_site_key'
    ];

    public static function getWormSource() {
        return WebForm::where('locale', '=', app()->getLocale() )->first();
    }
}
