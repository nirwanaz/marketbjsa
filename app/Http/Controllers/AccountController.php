<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Accounts as A;
use App\Models\Merchants as M;

class AccountController extends Controller
{
    //
    protected $optionValidateData = [
        'fullname' => 'required',
        'address' => 'required',
        'username' => 'required',
        'passwd' => 'required'
    ];

    public function index(){
        $account = A::all();

        return $account->tojson();
    }

    public function store(Request $request){
        $validatedData = $request->validate($this->optionValidateData);
        $string_name = explode(" ", $validatedData['fullname']);
        $rand_int = rand(1,1000);
        $account_id = date('Y').rand(10,99).random_int(100,999);

        DB::beginTransaction();

        try {
            $create = A::create([
                'id' => $account_id,
                'fullname' => $validatedData['fullname'],
                'address' => $validatedData['address'],
                'username' => $validatedData['username'],
                'passwd' => bcrypt($validatedData['passwd'])
            ]);
        } catch (ValidationException $e) {
            DB::rollback();
            return response()->json(['success' => false], 400);
        }
        
        try {
            $merchant = M::create([
                'name' => $string_name[0].$rand_int,
                'address' => $validatedData['address'],
                'account_id'=> $account_id
            ]);
        } catch (ValidationException $e) {
            DB::rollback();
            return response()->json(['success' => false], 400);
        }

        DB::commit();
        
        $msg = [
            'success' => true,
            'message' => 'Akun Berhasil Ditambahkan'
        ];

        return response()->json($msg);
    }

    public function getAccount($id){
        $account = A::findOrFail($id);

        return $account->toJson();
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate($this->optionValidateData);

        $msg = [
            'success' => true,
            'message' => 'Akun Berhasil Diperbarui'
        ];

        $account = A::findOrFail($id);
        $account->firstname = $validatedData['fname'];
        $account->lastname = $validatedData['lname'];
        $account->address = $validatedData['address'];
        $account->passwd = $validatedData['passwd'];

        $account->save();

        return response()->json($msg);
    }

    public function delete($id){
        $account = A::findOrFail($id);
        $account->delete();

        $msg = [
            'success' => true,
            'message' => 'Akun Berhasil Dihapus'
        ];

        return response()->json($msg);
    }

    public function login(Request $request){
        $validatedData = $request->validate([
            'username' => 'required',
            'passwd' => 'required'
        ]);

        $account = A::findByUsername($validatedData['username'])->first();

        if (!$account || !Hash::check($validatedData['passwd'], $account->passwd)){
            return response()->json([
                'success' => false,
                'message' => '[Tidak ditemukan username dan password yang cocok]'
            ], 404);
        }

        $token = $account->createToken('ApiToken')->plainTextToken;

        $response = [
            'success' => true,
            'token' => $token
        ];

        return response()->json($response);
    }

    public function logout()
    {
        try {
            auth()->logout();
         } catch(Throwable $e) {
            return response()->json($e);
        }

        $msg = [
            'success' => true,
            'message' => 'Logout Berhasil'
        ];

        return response()->json($msg, 200);
    }
}
