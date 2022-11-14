<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Language extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = ['name', 'id'];

    const ENGLISH  = 'en';
    const UKRAINE  = 'ua';
    const POLAND  = 'pl';

    const MAIN_LANGUAGE = self::ENGLISH;

    const ENG_FULL  = 'english';
    const UA_FULL   = 'ukrainian';
    const PL_FULL   = 'poland';


    public static function languages()
    {
        return collect([
            self::ENGLISH => self::ENG_FULL,
            self::UKRAINE => self::UA_FULL,
            self::POLAND => self::PL_FULL,
        ]);
    }
    const LANGUAGES = [self::ENGLISH];

    /**
     * @return HasMany
     */
    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
