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
        $validatedData = $request->validate($this->optionValidateData);

        M::create([
            'account_id' => $validatedData['acc_id'],
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            'is_open' => $validatedData['stats'],
            'opened' => $validatedData['open'],
            'closed' => $validatedData['close']
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
        
        $save = false;
        $merchant = M::findOrFail($id);
     
        if ($merchant->name !== $request->name) {
            $merchant->name = $request->name;
            $merchant->is_changename = 1;
            $save = true;
        }

        if ($merchant->address !== $request->address) {
            $merchant->address = $request->address;
            $save = true;
        }

        if ($merchant->image !== $request->picture) {
            $merchant->image = $request->picture ? $this->upload($request->picture) : NULL;
            $save = true;
        }

        if ($save) {
            $merchant->save();
        }

        $msg = [
            'success' => true,
            'message' => 'Profil toko berhasil diperbarui'
        ];

        return response()->json($msg); 
    }

    public function updateSetting(Request $request, $id){
        $merchant = M::findOrFail($id);
        $save = false;
        // standarisasi nilai dari atribut $is_open;
        $is_open = $request->isstatus ? '1' : '0';

        if ($merchant->opened !== $request->opened) {
            $merchant->opened = $request->opened;
            $save = true;
        }

        if ($merchant->closed !== $request->closed) {
            $merchant->closed = $request->closed;
            $save = true;
        }
        
        if ($merchant->is_open !== $is_open) {
            $merchant->is_open = $is_open;
            $save = true;
        }

        if ($save) {
            $merchant->save();
        }

        $msg = [
            'success' => true,
            'message' => 'Pengaturan Toko berhasil diperbarui'
        ];

        return response()->json($msg);
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate($this->optionValidateData);

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
