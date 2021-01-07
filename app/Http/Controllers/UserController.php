<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userNew(){
        $id_auth= auth()->id();
        $role = User::find($id_auth);

        return view('form/formUser');
    }

    // menampilkan data seluruh user
    public function userAll(){
        $id_auth= auth()->id();
        $role = User::find($id_auth);

        // mengambil seluruh data user
        $user = DB::table('users')
        ->select('*')
        ->where('deleted_at',null)
        ->orderBy('created_at', 'DESC')
        ->get();

        // mengambil total data user
        $user_count = User::all()->where('deleted_at', null)->count();

        return view('table/dataUser', [
            'users' => $user,
            'user_count'=>$user_count
        ]);
    }

    //store
    public function userStore(Request $request){
        $id_auth= auth()->id();
        $userNow= User::where('id',$id_auth)->get();
        $role = User::find($id_auth);
      
            // mass agiment user baru            
            $user = new User;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->jabatan = $request->jabatan;
            $user->save();

            return redirect('/user/all');
        
        
    }
}
