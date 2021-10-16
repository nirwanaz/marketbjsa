<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductTypes as PT;

class ProductTypeController extends Controller
{
    //
    public function index() {
        $pt = PT::all();

        return $pt->toJson();
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name'          => 'required',
            'description'   => 'required'

        ]);

        $create = PT::create([
            'name'           => $validatedData['name'],
            'description'    => $validatedData['description'] 
        ]);

        $msg = [
            'success' => true,
            'message' => 'Tipe Produk Berhasil Dibuat^^'
        ];

        return response()->json($msg);
    }

    public function getProductType($id){
        $pt = PT::findOrFail($id);

        return $pt->toJson();
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $msg = [
            'success' => true,
            'message' => 'Tipe Produk Berhasil Diperbarui'
        ];

        $pt = PT::findOrFail($id); 
        $pt->product_type_name = $validatedData['name'];
        $pt->product_type_description = $validatedData['description'];

        $pt->save();

        return response()->json($msg);
    }

    public function delete($id){
        $pt = PT::findOrFail($id);
        $pt->delete();

        $msg = [
                'success' => true,
                'message' => 'Tipe Produk Berhasil Dihapus'
            ];

        return response()->json($msg);
    }
}
