<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories as Catg;

class CategoryController extends Controller
{
    //
    protected $optionValidateData = [
        'name' => 'required',
        'description' => 'required',
        'pt_id' => 'required'
    ];

    public function index(){
        $categories = Catg::getInformation()->get();

        return $categories->toJson();
    }

    public function store(Request $request){
        $validatedData = $request->validate($this->optionValidateData);

        $create = Catg::create([
            'category_name'         => $validatedData['name'],
            'category_description'  => $validatedData['description'],
            'product_type_id'       => $validatedData['pt_id']
        ]);

        $msg = [
            'success' => true,
            'message' => 'Kategori Berhasil Ditambahkan'
        ];

        return response()->json($msg);
    }

    public function getCategory($id){
        $catg = Catg::findOrFail($id)->getInformation()->first();

        return $catg->toJson();
    }

    public function getCategoryByPtype($id){
        $catg = Catg::findByPtypeId($id)->get();

        return $catg->toJson();
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate($this->optionValidateData);

        $msg = [
            'success' => false,
            'message' => 'Kategori Gagal Diperbarui'
        ];

        $catg = Catg::findOrFail($id);
        $catg->category_name = $validatedData['name'];
        $catg->category_description = $validatedData['description'];
        $catg->category_type_id = $validatedData['pt_id'];

        $catg->save();
    
        return response()->json($msg);
    }

    public function delete($id){
        $catg = Catg::findOrFail($id);
        $catg->delete();

        $msg = [
            'success' => true,
            'message' => 'Kategori Berhasil Dihapus'
        ];

        return response()->json($msg);
    }
}
