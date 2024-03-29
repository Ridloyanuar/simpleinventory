<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    //
    public function barangNew(){
        $id_auth= auth()->id();
        // $role = User::find($id_auth);

        $satuans = [
            'kg'
        ];

        return view('form/formBarang', ['satuans' => $satuans]);
    }

    public function barangAll(){
        $id_auth= auth()->id();

        // mengambil seluruh data user
        $barang = DB::table('barangs')
        ->select('*')
        ->where('deleted_at',null)
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

        $rules = [
            'nama_barang' => 'required|string',
            'deskripsi_barang' => 'sometimes|required|string',
            'harga_satuan' => 'required|integer',
            'stok' => 'required|integer',
            'satuan' => 'required|string'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return $validator->errors();
        }

        $latest = Barang::latest()->first();

        if (! $latest) {
            $barang = new Barang();
            $barang->kode_barang = 'B001';
            $barang->gambar = $this->uploadFile($request->gambar, 'barang');
            $barang->nama_barang = $request->nama_barang;
            $barang->deskripsi_barang = $request->deskripsi;
            $barang->harga_satuan = $request->harga_satuan;
            $barang->stok = $request->stok;
            $barang->satuan = $request->satuan;
            $barang->created_by = 'admin';
            $barang->save();

            return route('admin.barang.all');
        }else{
            $string = preg_replace("/[^0-9\.]/", '', $latest->kode_barang);

            $kode_pelanggan = 'B' . sprintf('%03d', $string+1);

            $barang = new Barang();
            $barang->kode_barang = $kode_pelanggan;
            $barang->gambar = $this->uploadFile($request->gambar, 'barang');
            $barang->nama_barang = $request->nama_barang;
            $barang->deskripsi_barang = $request->deskripsi;
            $barang->harga_satuan = $request->harga_satuan;
            $barang->stok = $request->stok;
            $barang->satuan = $request->satuan;
            $barang->created_by = 'admin';
            $barang->save();

            return route('admin.barang.all');
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

        return route('admin.barang.all');
    }

    //delete
    public function barangDelete($id){

        $barang = Barang::findOrFail($id);
        $barang->delete();

        return route('admin.barang.all');
    }

    //upload file
    private function uploadFile($file, string $type)
    {
        if (null === $file) {
            return null;
        }

        $folder = 'Barang';

        if (!file_exists($folder)) {
            mkdir($folder);
        }

        $filename = $type . '_' . sha1(date('YmdHis')) . '.' . $file->getClientOriginalExtension();
        $file->move($folder, $filename);

        return $filename;
    }
}
