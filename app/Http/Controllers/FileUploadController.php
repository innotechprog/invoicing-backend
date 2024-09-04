<?php

// app/Http/Controllers/FileUploadController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function logoUpload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('./public/assets/img/company-logos', $filename);

            return response()->json(['message' => 'File uploaded successfully', 'path' => $path], 200);
        } else {
            return response()->json(['message' => 'No file uploaded'], 400);
        }
    }
}
