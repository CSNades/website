<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    public $timestamps = false;

    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)->firstOrFail();
    }

    public function nades()
    {
        return $this->hasMany(Nade::class);
    }
}
