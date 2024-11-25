<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FileUploadController extends Controller
{
    public function uploadFile(Request $request)
    {
        // Check if a file is uploaded
        if (!$request->hasFile('file')) {
            return response()->json(['error' => 'No file uploaded'], Response::HTTP_BAD_REQUEST);
        }

        // Process the uploaded file
        $file = $request->file('file');

        // Save the file (if needed)
        //$file->store('uploads'); // Saves to storage/app/uploads

        return response()->json(['message' => 'File uploaded successfully']);
    }
}
