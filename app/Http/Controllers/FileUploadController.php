<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FileUploadController extends Controller
{
    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:1024', // Max size in KB (1MB)
        ]);

        $path = $request->file('file')->store('uploads');

        return response()->json(['message' => 'File uploaded successfully']);
    }
}
