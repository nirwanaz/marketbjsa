<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\ProductImages as PI;

class ProductImageController extends Controller
{
    //
    
    public function upload($file)
    {
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $filenameFixed = preg_replace('/\s+/', '_', $filename);
        $extension = $file->getClientOriginalExtension();
        $newFilename = $filenameFixed.'_'.time().'.'.$extension; 

        if ($extension !== 'jpg' || $extension !== 'png') {
            return response()->json([
                'success' => false,
                'message' => 'format file tidak didukung'
            ], 400);
        }

        $saveImage = Storage::putFileAs('public/prod_img', $file, $newFilename);

        if (!$saveImage) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal untuk menyimpan gambar'
            ]);
        }

        $uploaded = [
            'name' => $filenameFixed,
            'filename' => $newFilename,
            'file_ext' => $extension
        ];

        return $uploaded;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'file_image' => 'required'
        ]);

        $upload = $this->upload($validatedData['file_image']);

        $product_img = PI::create([
            'product_id' => $validatedData['prod_id'],
            'product_image_name' => $upload['name'],
            'product_image_filename' => $upload['filename'],
            'product_image_ext' => $upload['file_ext']
        ]);

        $msg = [
            'success' => true,
            'message' => 'Produk Berhasil Ditambahkan'
        ];

        return response()->json($msg);
    }
}
