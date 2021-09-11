<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchants as M;

class MerchantController extends Controller
{
    //
    protected $optionValidateData = [
        'acc_id' => 'required',
        'name' => 'required',
        'address' => 'required',
        'stats' => 'required',
        'open' => 'required',
        'close' => 'required'
    ];

    public function index(){
        $merchant = M::getInformation()->get();

        return $merchant->toJson();
    }

    public function store(Request $request){
        $validatedData = $request->validate($optionValidateData);

        $create = M::create([
            'account_id' => $validatedData['acc_id'],
            'merchant_name' => $validatedData['name'],
            'merchant_address' => $validatedData['address'],
            'merchant_status' => $validatedData['stats'],
            'mercahnt_open' => $validatedData['open'],
            'merchant_close' => $validatedData['close']
        ]);

        $msg = [
            'success' => true,
            'message' => 'Toko berhasil Ditambahkan'
        ];

        return response()->json($msg);
    }

    public function getMerchant($id){
        $merchant = M::findOrFail($id)->getInformation()->first();

        return $merchant->toJson();
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate($optionValidateData);

        $merchant = M::findOrFail($id);
        $merchant->merchant_name = $validatedData['name'];
        $merchant->merchant_address = $validatedData['address'];
        $merchant->merchant_status = $validatedData['stats'];
        $merchant->merchant_open = $validatedData['open'];
        $merchant->merchant_close = $validatedData['close'];
       
        $merchant->save();

        $msg = [
            'success' => true,
            'message' => 'Toko Berhasil Diperbarui'
        ];

        return response()->json($msg);
    }

    public function delete($id){
        $merchant = M::findOrFail($id);
        $merchant->delete();

        $msg = [
            'success' => true,
            'message' => 'Toko Berhasil Dihapus'
        ];

        return response()->json($msg);
    }
}
