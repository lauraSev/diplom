<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getCreatedAtAttribute($value)
    {
        $dt =  Carbon::createFromFormat('Y-m-d H:i:s', $value);
        return $dt->format('d.m.Y H:i:s');
    }

    public function role($role) {
        $r = mb_convert_case(substr($role,0,1),MB_CASE_UPPER,'UTF-8');
        return $this->group==$r;
    }
}
