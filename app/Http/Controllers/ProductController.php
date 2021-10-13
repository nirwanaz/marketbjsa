<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Products as Prod;

class ProductController extends Controller
{
    //
    protected $optionValidateData = [
        'name' => 'required',
        'catg_id' => 'required',
        'm_id' => 'required',
        'price' => 'required',
        'description' => 'required'
    ];
    
    public function index(){
        $prod = Prod::getInformation()->get();

        return $prod->toJson();
    }

    public function store(Request $request){
        $id = 'P' . random_int(100,999) . rand(2,7);

        $validatedData = $request->validate($this->optionValidateData);
        
        try {
            $create = Prod::create([
                'id' => $id,
                'merchant_id' => $validatedData['m_id'],
                'category_id' => $validatedData['catg_id'],
                'name' => $validatedData['name'],
                'image' => $request->image ? $this->upload($request->image) : NULL,
                'price' => $validatedData['price'],
                'description' => $validatedData['description']
            ]);
        } catch (Exception $e) {
            echo "Insert Error";
        }

        $msg = [
            'success' => true,
            'message' => 'Produk Berhasil Ditambahkan'
        ];

        return response()->json($msg);
    }

    public function getProduct($id){
        $prod = Prod::findOrFail($id)->getInformation()->first();

        return $prod->toJson();
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate($optionValidateData);

        $prod = Prod::findOrfail($id);
        $prod->category_id = $validatedData['catg_id'];
        $prod->product_name = $validatedData['name'];
        $prod->product_price = $validatedData['price'];

        $prod->save();

        $msg = [
            'success' => true,
            'message' => 'Produk Berhasil Diperbarui'
        ];

        return response()->json(msg);
    }

    public function delete($id){
        $prod = Prod::findOrFail($id);
        $prod->delete();

        $msg = [
            'success' => true,
            'message' => 'Produk Berhasil Dihapus'
        ];

        return response()->json($msg);
    }

    private function upload($file)
    {
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $filenameFixed = preg_replace('/\s+/', '_', $filename);
        $extension = $file->getClientOriginalExtension();
        $newFilename = $filenameFixed.'_'.time().'.'.$extension; 

        $saveImage = Storage::putFileAs('public/prod_img', $file, $newFilename);

        if (!$saveImage) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal untuk menyimpan gambar'
            ]);
        }

        return $newFilename;
    }
}
