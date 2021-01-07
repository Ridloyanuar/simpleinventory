<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function supplierNew(){
        $id_auth= auth()->id();
        // $role = User::find($id_auth);

        return view('form/formSupplier');
    }

    public function supplierAll(){
        $id_auth= auth()->id();

        // mengambil seluruh data user
        $supplier = DB::table('pemasoks')
        ->select('*')
        ->where('deleted_at',null)
        ->get();

        // mengambil total data user
        $supplier_count = DB::table('pemasoks')->count();

        return view('table/dataSupplier', [
            'suppliers' => $supplier,
            'supplier_count'=>$supplier_count
        ]);
    }

    //store
    public function supplierStore(Request $request){
        $id_auth= auth()->id();
        $latest = Pemasok::latest()->first();

        if (! $latest) {
            $supplier = new Pemasok;
            $supplier->kode_supplier = "S001";
            $supplier->nama_supplier = $request->nama_lengkap;
            $supplier->no_telp_supplier = $request->no_telp;
            $supplier->alamat_supplier = $request->alamat;
            $supplier->save();

            return redirect('/supplier/all');
        }else{
            $string = preg_replace("/[^0-9\.]/", '', $latest->kode_supplier);

            $kode_supplier = 'S' . sprintf('%03d', $string+1);

            $supplier = new Pemasok;
            $supplier->kode_supplier = $kode_supplier;
            $supplier->nama_supplier = $request->nama_lengkap;
            $supplier->no_telp_supplier = $request->no_telp;
            $supplier->alamat_supplier = $request->alamat;
            $supplier->save();

            return redirect('/supplier/all');

        }
        
    }

    function invoiceNumber()
{
    $latest = Pemasok::latest()->first();

    if (! $latest) {
        return 'S0001';
    }

    $string = preg_replace("/[^0-9\.]/", '', $latest->kode_supplier);

    return 'S' . sprintf('%04d', $string+1);
}
}
