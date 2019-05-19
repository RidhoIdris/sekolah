<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterGuru;

class MasterGuruController extends Controller
{
    public function index(){

        return view('guru.index');
    }

    public function show(){
        $guru = MasterGuru::orderBy('created_at','DESC')->get();
        return Datatables($guru)
                ->addIndexColumn()
                ->addColumn('action',function($guru){
                    return '<button type="button" data-id="'.$guru->nip.'" id="edit" class="btn btn-primary btn-sm">Edit</button><button type="button" data-id="'.$guru->nip.'" id="hapus" class="btn btn-danger btn-sm">hapus</button>';
                })->toJson();
    }

    public function store(Request $request){
        $validator = \Validator::make($request->all(),
            [
                'nip' => 'required|digits:8|integer|unique:master_gurus',
                'nama_guru' => 'required|max:50',
                'tempat_lahir' => 'required|max:50',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|max:10',
                'agama' => 'required|max:25',
                'gol_darah' => 'required|max:1',
                'provinsi' => 'required|integer',
                'kabupaten' => 'required|integer',
                'kecamatan' => 'required|integer',
                'kelurahan' => 'required|integer',
                'alamat' => 'required|max:250',
            ]
        );

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->first()],422);
        }else{
            MasterGuru::create([
                'nama_guru'=> request('nama_guru'),
                'nip'=> request('nip'),
                'tempat_lahir'=> request('tempat_lahir'),
                'tanggal_lahir'=> request('tanggal_lahir'),
                'jenis_kelamin'=> request('jenis_kelamin'),
                'agama'=> request('agama'),
                'gol_darah'=> request('gol_darah'),
                'provinsi'=> request('provinsi'),
                'kabupaten'=> request('kabupaten'),
                'kecamatan'=> request('kecamatan'),
                'kelurahan'=> request('kelurahan'),
                'alamat'=> request('alamat'),
            ]);
            return response()->json(['message'=>'Guru Berhasil Ditambahkan']);
        }
    }

    public function update(Request $request,$nip){
        $validator = \Validator::make($request->all(),
            [
                'nama_guru' => 'required|max:50',
                'tempat_lahir' => 'required|max:50',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|max:10',
                'agama' => 'required|max:25',
                'gol_darah' => 'required|max:1',
                'provinsi' => 'required|integer',
                'kabupaten' => 'required|integer',
                'kecamatan' => 'required|integer',
                'kelurahan' => 'required|integer',
                'alamat' => 'required|max:250',
            ]
        );

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->first()],422);
        }else{
            MasterGuru::where(['nip'=>$nip])->update([
                'nama_guru'=> request('nama_guru'),
                'tempat_lahir'=> request('tempat_lahir'),
                'tanggal_lahir'=> request('tanggal_lahir'),
                'jenis_kelamin'=> request('jenis_kelamin'),
                'agama'=> request('agama'),
                'gol_darah'=> request('gol_darah'),
                'provinsi'=> request('provinsi'),
                'kabupaten'=> request('kabupaten'),
                'kecamatan'=> request('kecamatan'),
                'kelurahan'=> request('kelurahan'),
                'alamat'=> request('alamat'),
            ]);
            return response()->json(['message'=>'Guru Berhasil Diubah']);
        }
    }

    public function delete($nip){
        MasterGuru::findOrFail($nip)->delete($nip);
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function edit($nip){
        $guru = MasterGuru::whereNip($nip)->first();
        return response()->json($guru);
    }
}
