<?php

namespace App\Http\Controllers;

use App\Models\AppFile;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AppFileController extends Controller
{
    public function imageUpload(Request $request)
    {

        try {
            $picture = collect();
            $source = $request->file('upload');
            $file = new File($source);
            $name = $file->hashName();

            $location = AppFile::APP_IMAGES_PATH . '/original';

            $path = Storage::disk('public')->putFileAs($location, $file, $name);

            $picture->put('path', $path);
            $picture->put('location', $location);
            $picture->put('name', $name);
            $picture->put('extension', $file->extension());

            $result = $this->store($picture);
            $img = Image::make($source->getRealPath())->fit(300, 300)->save();
            $path300 = Storage::disk('public')->putFileAs(AppFile::APP_IMAGES_PATH.'/300', $img->basePath(), $name);
            return response([
                'urls' => [
                    'default' => asset('storage/' . $path),
                    '300' => asset('storage/' . $path300),
                ]
            ]);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
        }
    }

    public function store($file)
    {
        return AppFile::create($file->all());
    }
}
