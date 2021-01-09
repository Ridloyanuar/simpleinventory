<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailPembelian;
use App\Models\Pemasok;
use App\Models\Pembelian;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    public function pembelianNew(){
        $id_auth= auth()->id();
        // $role = User::find($id_auth);
        $supplier = Pemasok::all();
        $barang = Barang::all();

        return view('form/formPembelian',['barangs' => $barang, 'suppliers' => $supplier]);
    }

    public function pembelianAll(){
        $id_auth= auth()->id();

        // mengambil seluruh data user
        $pembelians = DB::table('pembelians')
        ->select('*')
        ->where('deleted_at',null)
        ->get();

        // mengambil total data user
        $pembelians_count = DB::table('pembelians')->count();

        return view('table/dataPembelian', [
            'pembelians' => $pembelians,
            'pembelian_count'=>$pembelians_count
        ]);
    }

    public function getBarang($id){

        $barang = Barang::where('kode_barang',$id)->get();
        return response()->json(['data' => $barang]);

    }

    //store
    public function pembelianStore(Request $request){
        $id_auth= auth()->id();
        $user = User::find($id_auth)->first();
        $username = $user->username;
        $latest = Pembelian::latest()->first();

        if (! $latest) {
            $pembelian = new Pembelian();
            $pembelian->kode_pembelian = "TB001";
            $pembelian->tanggal_pembelian = date("Y-m-d h:i:s");
            $pembelian->kode_supplier = $request->supplier;
            $pembelian->total_biaya = $request->harga_total;
            $pembelian->tanggal_dibuat = date("Y-m-d h:i:s");
            $pembelian->dibuat_oleh = $username;
            $pembelian->save();

            $items = count( (array) $request->barang);
            for($item=0; $item < $items; $item++){

                $detailPembelian = new DetailPembelian();
                $detailPembelian->kode_pembelian = "TB001";
                $detailPembelian->kode_barang = $request->barang[$item];
                $detailPembelian->harga_satuan = $request->item_nama_barang[$item];
                $detailPembelian->jumlah = $request->item_jumlah[$item];
                $detailPembelian->created_at = date("m/d/Y");
                $detailPembelian->save();

                $barang = Barang::where('kode_barang', $request->barang[$item])->first();
                $stok = $barang->stok;
                $update_stok = $request->item_jumlah[$item] + $stok;

                 Barang::where('kode_barang', $request->barang[$item])->update([
                    'stok' => $update_stok
                ]);

            }

            return redirect('/barang/all');
        }else{
            $string = preg_replace("/[^0-9\.]/", '', $latest->kode_pembelian);

            $kode_pembelian = 'TB' . sprintf('%03d', $string+1);

            $pembelian = new Pembelian();
            $pembelian->kode_pembelian = $kode_pembelian;
            $pembelian->tanggal_pembelian = date("Y-m-d h:i:s");
            $pembelian->kode_supplier = $request->supplier;
            $pembelian->total_biaya = $request->harga_total;
            $pembelian->tanggal_dibuat = date("Y-m-d h:i:s");
            $pembelian->dibuat_oleh = $username;
            $pembelian->save();

            $items = count( (array) $request->barang);
            for($item=0; $item < $items; $item++){

                $detailPembelian = new DetailPembelian();
                $detailPembelian->kode_pembelian = $kode_pembelian;
                $detailPembelian->kode_barang = $request->barang[$item];
                $detailPembelian->harga_satuan = $request->item_nama_barang[$item];
                $detailPembelian->jumlah = $request->item_jumlah[$item];
                $detailPembelian->created_at = date("m/d/Y");
                $detailPembelian->save();

                $barang = Barang::where('kode_barang', $request->barang[$item])->first();
                $stok = $barang->stok;
                $update_stok = $request->item_jumlah[$item] + $stok;

                 Barang::where('kode_barang', $request->barang[$item])->update([
                    'stok' => $update_stok
                ]);

            }

            return redirect('/barang/all');

        }
        
    }
}
