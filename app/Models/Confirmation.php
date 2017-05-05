<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Confirmation extends Model
{
    public $timestamps = false;

    protected $fillable = array('code');

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
