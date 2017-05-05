<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    public $timestamps = false;

    public function nades()
    {
        return $this->hasMany(Nade::class);
    }
}
