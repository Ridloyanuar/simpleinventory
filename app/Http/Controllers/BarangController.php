<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    //
    public function barangNew(){
        $id_auth= auth()->id();
        // $role = User::find($id_auth);

        return view('form/formBarang');
    }

    public function barangAll(){
        $id_auth= auth()->id();

        // mengambil seluruh data user
        $barang = DB::table('barangs')
        ->select('*')
        ->where('deleted_at',null)
        ->orderBy('created_at', 'DESC')
        ->get();

        // mengambil total data user
        $barang_count = DB::table('barangs')->count();

        return view('table/dataBarang', [
            'barangs' => $barang,
            'barang_count'=>$barang_count
        ]);
    }

    //store
    public function barangStore(Request $request){
        $id_auth= auth()->id();
        $latest = Barang::latest()->first();

        if (! $latest) {
            $barang = new Barang();
            $barang->kode_barang = "B001";
            $barang->nama_barang = $request->nama_barang;
            $barang->deskripsi_barang = $request->deskripsi;
            $barang->harga_satuan = $request->harga_satuan;
            $barang->stok = $request->stok;
            $barang->save();

            return redirect('/barang/all');
        }else{
            $string = preg_replace("/[^0-9\.]/", '', $latest->kode_barang);

            $kode_pelanggan = 'B' . sprintf('%03d', $string+1);

            $barang = new Barang();
            $barang->kode_barang = $kode_pelanggan;
            $barang->nama_barang = $request->nama_barang;
            $barang->deskripsi_barang = $request->deskripsi;
            $barang->harga_satuan = $request->harga_satuan;
            $barang->stok = $request->stok;
            $barang->save();

            return redirect('/barang/all');

        }
        
    }

    //halaman update
    public function barangEdit($id){
        // mengambil data barang berdasarkan id yang dipilih
        $barang = Barang::where('id',$id)->get();
        
        return view('form/formBarangEdit', [
            'barangs' => $barang,
        ]);
    }

    //Update
    public function barangUpdate(Request $request, $id){

        // update data barang berdasarkan id pada $id
        Barang::where('id', $id)->update([
            'nama_barang' => $request->nama_barang,
            'deskripsi_barang' => $request->deskripsi,
            'harga_satuan' => $request->harga_satuan,
            'stok' => $request->stok
        ]);

        return redirect('/barang/all');
    }

    //delete
    public function barangDelete($id){

        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect('/barang/all');
    }
}
