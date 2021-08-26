<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Test extends Controller
{
    public function test()
    {
        return response()->json(['test' => 'Hello World!']);
    }
}
