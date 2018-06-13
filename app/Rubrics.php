<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Rubrics extends Model
{
    public function getCreatedAtAttribute($value)
    {
        $dt =  Carbon::createFromFormat('Y-m-d H:i:s', $value);
        return $dt->format('d.m.Y');
    }
    public function getUpdatedAtAttribute($value)
    {
        $dt =  Carbon::createFromFormat('Y-m-d H:i:s', $value);
        return $dt->format('d.m.Y');
    }

}
