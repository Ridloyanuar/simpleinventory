<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function penjualanNew(){
        $id_auth= auth()->id();
        // $role = User::find($id_auth);
        $pelanggan = Pelanggan::all();
        $barang = Barang::all();

        return view('form/formPenjualan',['barangs' => $barang, 'pelanggans' => $pelanggan]);
    }

    public function penjualanAll(){
        $id_auth= auth()->id();

        // mengambil seluruh data user
        $penjualan = Penjualan::with('Pelanggan', 'DetailPenjualan.Barang')->where('deleted_at', null)->get();

        // mengambil total data user
        $penjualan_count = $penjualan->count();
        $totalJual = [];
        foreach ($penjualan as $jual) {
            $totalJual [] = $jual->total_biaya;
        }

        $totalSemuanya =  array_sum($totalJual);

        return view('table/dataPenjualan', [
            'penjualans' => $penjualan,
            'penjualan_count' => $penjualan_count,
            'total_jual' => number_format($totalSemuanya, 2, '.', ',')
        ]);
    }

    //delete
    public function penjualanDelete($kode) {
        $penjualan = Penjualan::where('kode_penjualan',$kode)->first();
        $detailPenjualan = DetailPenjualan::where('kode_penjualan',$kode);
        $penjualan->delete();
        $detailPenjualan->delete();

        return route('admin.penjualan.all');
    }

    public function getBarang($id) {

        $barang = Barang::where('kode_barang',$id)->get();
        return response()->json(['data' => $barang]);

    }

    //store
    public function penjualanStore(Request $request){
        $id_auth= auth()->id();
        $user = User::find($id_auth)->first();
        $username = $user->username;
        $latest = Penjualan::latest()->first();

        if (! $latest) {
            $items = count( (array) $request->barang);
            for($item=0; $item < $items; $item++){
                $barang = Barang::where('kode_barang', $request->barang[$item])->first();
                $stok = $barang->stok;
                $update_stok = $stok - $request->item_jumlah[$item];

                if($stok<$request->item_jumlah[$item]){
                    echo '<script language="javascript">';
                    echo 'alert("Oops! Jumlah pengeluaran lebih besar dari stok ...")';
                    echo '</script>';
                                
                    return redirect()->back();
                }else{
                    
                    $detailPenjualan = new DetailPenjualan();
                    $detailPenjualan->kode_penjualan = "TJ001";
                    $detailPenjualan->kode_barang = $request->barang[$item];
                    $detailPenjualan->harga_satuan = $request->item_nama_barang[$item];
                    $detailPenjualan->jumlah = $request->item_jumlah[$item];
                    $detailPenjualan->created_at = date("m/d/Y");
                    $detailPenjualan->save();

                    Barang::where('kode_barang', $request->barang[$item])->update([
                        'stok' => $update_stok
                    ]);     

                }
            }

            $penjualan = new Penjualan();
            $penjualan->kode_penjualan = "TJ001";
            $penjualan->tanggal_penjualan = date("Y-m-d h:i:s");
            $penjualan->kode_pelanggan = $request->pelanggan;
            $penjualan->total_biaya = $request->harga_total;
            $penjualan->tanggal_dibuat = date("Y-m-d h:i:s");
            $penjualan->dibuat_oleh = $username;
            $penjualan->save();

            return route('admin.penjualan.all');
        }else{
            $string = preg_replace("/[^0-9\.]/", '', $latest->kode_penjualan);

            $kode_penjualan = 'TJ' . sprintf('%03d', $string+1);

            $items = count( (array) $request->barang);
            for($item=0; $item < $items; $item++){
                $barang = Barang::where('kode_barang', $request->barang[$item])->first();
                $stok = $barang->stok;
                $update_stok = $stok - $request->item_jumlah[$item];

                if($stok<$request->item_jumlah[$item]){
                    echo "<script>";
                    echo "alert('Oops! Jumlah pengeluaran lebih besar dari stok ...')";
                    echo "</script>";
                    // return "<script>alert('username atau password salah')</script>";
                    return redirect()->back()->with('alert'.'Oops! Jumlah pengeluaran lebih besar dari stok ...');
                }else {
                    $detailPenjualan = new DetailPenjualan();
                    $detailPenjualan->kode_penjualan = $kode_penjualan;
                    $detailPenjualan->kode_barang = $request->barang[$item];
                    $detailPenjualan->harga_satuan = $request->item_nama_barang[$item];
                    $detailPenjualan->jumlah = $request->item_jumlah[$item];
                    $detailPenjualan->created_at = date("m/d/Y");
                    $detailPenjualan->save();

                    Barang::where('kode_barang', $request->barang[$item])->update([
                        'stok' => $update_stok
                    ]);     
                }
            }

            $penjualan = new Penjualan();
            $penjualan->kode_penjualan = $kode_penjualan;
            $penjualan->tanggal_penjualan = date("Y-m-d h:i:s");
            $penjualan->kode_pelanggan = $request->pelanggan;
            $penjualan->total_biaya = $request->harga_total;
            $penjualan->tanggal_dibuat = date("Y-m-d h:i:s");
            $penjualan->dibuat_oleh = $username;
            $penjualan->save();

            return route('admin.penjualan.all');
        }
        
    }
}
