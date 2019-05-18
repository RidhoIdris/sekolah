<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;

class KelasController extends Controller
{
    public function index(){
        return view("kelas.index");
    }

    public function show(){
        $kelas = Kelas::orderBy('created_at','DESC')->get();
        return Datatables($kelas)
                ->addIndexColumn()
                ->addColumn('action',function($kelas){
                    return '<button type="button" data-id="'.$kelas->kode_kelas.'" id="edit" class="btn btn-primary btn-sm">Edit</button><button type="button" data-id="'.$kelas->kode_kelas.'" id="hapus" class="btn btn-danger btn-sm">hapus</button>';
                })->toJson();
    }

    public function store(Request $request){
        $validator = \Validator::make($request->all(),
            [
                'kode_kelas' => 'required|max:8|string|unique:kelas',
                'nama_kelas' => 'required|max:50',
            ]
        );

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->first()],422);
        }else{
            Kelas::create([
                'kode_kelas'=> request('kode_kelas'),
                'nama_kelas'=> request('nama_kelas'),
            ]);
            return response()->json(['message'=>'Kelas Berhasil Ditambahkan']);
        }
    }

    public function delete($kode_kelas){
        Kelas::findOrFail($kode_kelas)->delete($kode_kelas);
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function edit($kode_kelas){
        $kelas = Kelas::whereKode_kelas($kode_kelas)->first();
        return response()->json($kelas);
    }

    public function update(Request $request,$kode_kelas){
        $validator = \Validator::make($request->all(),
            [
                'nama_kelas' => 'required|max:50',
            ]
        );

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->first()],422);
        }else{
            Kelas::where(['kode_kelas'=>$kode_kelas])->update([
                'nama_kelas'=> request('nama_kelas'),
            ]);
            return response()->json(['message'=>'Kelas Berhasil Diubah']);
        }
    }
}
