<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rubrics;

class RubricsController extends Controller
{
  public function index()
  {
    return view('rubrics', ['items' => Rubrics::all()]);
  }
}
