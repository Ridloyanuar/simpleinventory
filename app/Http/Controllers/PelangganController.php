<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    public function pelangganNew(){
        $id_auth= auth()->id();
        // $role = User::find($id_auth);

        return view('form/formPelanggan');
    }

    public function pelangganAll(){
        $id_auth= auth()->id();

        // mengambil seluruh data user
        $pelanggan = DB::table('pelanggans')
        ->select('*')
        ->where('deleted_at',null)
        ->get();

        // mengambil total data user
        $pelanggan_count = DB::table('pelanggans')->count();

        return view('table/dataPelanggan', [
            'pelanggans' => $pelanggan,
            'pelanggan_count'=>$pelanggan_count
        ]);
    }

    //store
    public function pelangganStore(Request $request){
        $id_auth= auth()->id();
        $latest = Pelanggan::latest()->first();

        if (! $latest) {
            $pelanggan = new Pelanggan();
            $pelanggan->kode_pelanggan = "P001";
            $pelanggan->nama_pelanggan = $request->nama_lengkap;
            $pelanggan->no_telp_pelanggan = $request->no_telp;
            $pelanggan->alamat_pelanggan = $request->alamat;
            $pelanggan->save();

            return redirect('/pelanggan/all');
        }else{
            $string = preg_replace("/[^0-9\.]/", '', $latest->kode_pelanggan);

            $kode_pelanggan = 'P' . sprintf('%03d', $string+1);

            $pelanggan = new Pelanggan();
            $pelanggan->kode_pelanggan = $kode_pelanggan;
            $pelanggan->nama_pelanggan = $request->nama_lengkap;
            $pelanggan->no_telp_pelanggan = $request->no_telp;
            $pelanggan->alamat_pelanggan = $request->alamat;
            $pelanggan->save();

            return redirect('/pelanggan/all');

        }
        
    }
}
