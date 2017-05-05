<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\BaseModel;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The database table used by the model.
     *
     * @var string
     */

    protected $dates = ['confirmed_at'];

    protected $fillable = [
        'username', 'password', 'email', 'is_mod', 'is_admin', 'active',
    ];

    protected $messages = [
        'password2.required' => 'The password confirmation is required.',
        'password2.same' => 'The password and password confirmation must match.',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
    public function confirm($code)
    {
        //
    }

    public function confirmation()
    {
        return $this->hasOne('Confirmation');
    }

    public function nades()
    {
        return $this->hasMany(App\Models\Nade::class);
    }
}
