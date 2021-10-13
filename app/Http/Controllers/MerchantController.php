<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    public function haveMerchant($account_id){
        $merchant = M::findByAccountId($account_id)->first();

        return $merchant->toJson();
    }

    public function updateProfile(Request $request, $id){
        $merchant = M::findOrFail($id);
        $merchant->name = $request->name;
        $merchant->address = $request->address;
        $merchant->ischangename = 1;
        $merchant->picture = $request->picture ? $this->upload($request->picture) : NULL;

        $merchant->save();

        $msg = [
            'success' => true,
            'message' => 'Profil toko berhasil diperbarui'
        ];

        return response()->json($msg); 
    }

    public function updateSetting(Request $request, $id){
        $merchant = M::findOrFail($id);
        $merchant->opened = $request->opened;
        $merchant->closed = $request->closed;
        $merchant->status = $request->isstatus ? '1' : '0';

        $merchant->save();

        $msg = [
            'success' => true,
            'message' => 'Pengaturan Toko berhasil diperbarui'
        ];

        return response()->json($msg);
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate($optionValidateData);

        $merchant = M::findOrFail($id);
        $merchant->name = $validatedData['name'];
        $merchant->address = $validatedData['address'];
        $merchant->status = $validatedData['stats'];
        $merchant->opened = $validatedData['open'];
        $merchant->closed = $validatedData['close'];
       
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

    private function upload($file)
    {
        $typeAllowed = ['jpg', 'jpeg', 'png'];
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $filenameFixed = preg_replace('/\s+/', '_', $filename);
        $extension = $file->getClientOriginalExtension();
        $newFilename = $filenameFixed.'_'.time().'.'.$extension; 
        
        if (!$check = in_array($extension, $typeAllowed)) {
            return response();
        }

        $saveImage = Storage::putFileAs('public/merchant_img', $file, $newFilename);

        if (!$saveImage) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal untuk menyimpan gambar'
            ], 500);
        }

        return $newFilename;
    }
}
