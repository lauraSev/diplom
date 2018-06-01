<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Questions extends Model
{
  public function getDateAnswerAttribute($value)
  {
      $dt =  Carbon::createFromFormat('Y-m-d H:i:s', $value);
      return $dt->format('d.m.Y');
  }

  // public function creater()
  // {
  //     return $this->hasOne('App\User');
  // }
  public function rubric()
  {
      return $this->belongsTo('App\Rubrics','topic_id');
  }

}
