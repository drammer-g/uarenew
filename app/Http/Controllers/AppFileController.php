<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AppFileController extends Controller
{
    public function upload(Request $request, string $location = '')
    {
//        dd($request->file('upload'));
        try {
            $picture = collect();
            $file = new File($request->file('upload'));
            return true;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
        }
    }
}
