<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rubrics;

class RubricsController extends Controller
{
  public function index()
  {
    $items = Rubrics::paginate(15);
    return view('admin.rubrics', ['items' => $items]);

  }
}
