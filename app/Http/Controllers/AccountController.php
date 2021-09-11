<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accounts as A;

class AccountController extends Controller
{
    //
    protected $optionValidateData = [
        'fname' => 'required',
        'lname' => 'required',
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

        $create = A::create([
            'firstname' => $validatedData['fname'],
            'lastname' => $validatedData['lname'],
            'address' => $validatedData['address'],
            'username' => $validatedData['username'],
            'passwd' => $validatedData['passwd']
        ]);

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
}
