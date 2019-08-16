<?php

namespace App\Http\Controllers;

use App\ImageLinks;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param $input_name key of of the file input in the form
     * @return string Name of the saved file.
     */
    public static function store(Request $request, $input_name)
    {
        $image = $request->file($input_name);
        $imageName = $image->getClientOriginalName();
        $image->move(storage_path('uploads'), $imageName);
        return $imageName;
    }

    public static function destroy(Request $request)
    {
        $filename = $request->get('filename');
        $path = storage_path() . '/uploads/' . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

}
