<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterSiswa;

class MasterSiswaController extends Controller
{
    public function index(){
        return view('siswa.index');
    }

    public function show(){
        $siswa = MasterSiswa::orderBy('created_at','DESC')->get();
        return Datatables($siswa)
                ->addIndexColumn()
                ->addColumn('action',function($siswa){
                    return '<button type="button" data-id="'.$siswa->nis.'" id="edit" class="btn btn-primary btn-sm">Edit</button><button type="button" data-id="'.$siswa->nis.'" id="hapus" class="btn btn-danger btn-sm">hapus</button>';
                })->toJson();
    }

    public function store(Request $request){
        $validator = \Validator::make($request->all(),
            [
                'nis' => 'required|digits:8|integer|unique:master_siswa',
                'nama_siswa' => 'required|max:50',
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
            MasterSiswa::create([
                'nama_siswa'=> request('nama_siswa'),
                'nis'=> request('nis'),
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
            return response()->json(['message'=>'Siswa Berhasil Ditambahkan']);
        }
    }

    public function update(Request $request,$nis){
        $validator = \Validator::make($request->all(),
            [
                'nama_siswa' => 'required|max:50',
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
            MasterSiswa::where(['nis'=>$nis])->update([
                'nama_siswa'=> request('nama_siswa'),
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
            return response()->json(['message'=>'Siswa Berhasil Diubah']);
        }
    }

    public function delete($nis){
        MasterSiswa::findOrFail($nis)->delete($nis);
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function edit($nis){
        $siswa = MasterSiswa::whereNis($nis)->first();
        return response()->json($siswa);
    }

}
