<?php

namespace App\Http\Controllers;

use App\ImageLinks;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ImageLinksController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public static function uploadFile(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(storage_path('uploads'), $imageName);

        $imageUpload = new ImageLinks();
        $imageUpload->resource_id = 1; //;$request->resource_id;
        $imageUpload->resource = "Cover Image"; //$request->resource;
        $imageUpload->file_path = $imageName;
        $imageUpload->save();
        return response()->json(['success' => $imageName]);
    }

    public static function deleteFile(Request $request)
    {
        $filename = $request->get('filename');
        ImageLinks::where('file_path', $filename)->delete();
        $path = storage_path() . '/uploads/' . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

}
