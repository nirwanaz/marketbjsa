<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products as Prod;

class ProductController extends Controller
{
    //
    protected $optionValidateData = [
        'name' => 'required',
        'm_id' => 'required',
        'catg_id' => 'required',
        'price' => 'required'
    ];
    
    public function index(){
        $prod = Prod::getInformation()->get();

        return $prod->toJson();
    }

    public function store(Request $request){
        $validatedData = $request->validate($optionValidateData);

        $create = Prod::create([
            'merchant_id' => $validatedData['m_id'],
            'category_id' => $validatedData['catg_id'],
            'product_name' => $validatedData['name'],
            'product_price' => $validatedData['price']
        ]);

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
}
