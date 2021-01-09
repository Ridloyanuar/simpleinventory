<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailPembelian;
use App\Models\DetailPenjualan;
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

    //halaman update
    public function userEdit($id){
        // mengambil data service dokter berdasarkan id yang dipilih
        $user = User::where('id',$id)->get();
        
        return view('form/formUserEdit', [
            'users' => $user,
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

    //Update
    public function userUpdate(Request $request, $id){

        // update data alamat berdasarkan id pada $id
        User::where('id', $id)->update([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'jabatan' => $request->jabatan
        ]);

        return redirect('/user/all');
    }

    //delete
    public function userDelete($id){

        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/user/all');
    }

    //mutasi
    public function mutasiNew(Request $request){
        $id_auth= auth()->id();
        // $role = User::find($id_auth);
        $barang = Barang::all();
        $mutasiMasuk = DetailPembelian::where('kode_barang', $request->kode_barang)
        ->whereBetween('created_at',[$request->tanggal_awal,$request->tanggal_akhir])->get();

        // dd($mutasiMasuk);
        return view('form/formMutasi',['barangs' => $barang,'masuk' => $mutasiMasuk]);
    }

    //mutasi
    public function mutasiKeluarNew(Request $request){
        $id_auth= auth()->id();
        // $role = User::find($id_auth);
        $barang = Barang::all();
        $mutasiKeluar = DetailPenjualan::where('kode_barang', $request->kode_barang)
        ->whereBetween('created_at',[$request->tanggal_awal,$request->tanggal_akhir])->get();

        // dd($mutasiMasuk);
        return view('form/formMutasiKeluar',['barangs' => $barang,'keluar' => $mutasiKeluar]);
    }

   
}
