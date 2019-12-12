<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiDataController extends Controller
{
    public function insertData(Request $request)
    {
      return $request->all();
    }
}
