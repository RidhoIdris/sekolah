<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterSiswa;

class MasterSiswaController extends Controller
{
    public function index()
    {
        return view('siswa.index');
    }

    public function show()
    {
        $siswa = MasterSiswa::orderBy('created_at','ASC')->get();
        return Datatables($siswa)
                ->addIndexColumn()
                ->addColumn('action',function($siswa){
                    return '<button type="button" data-id="'.$siswa->nis.'" id="edit" class="btn btn-primary btn-sm">Edit</button><button type="button" data-id="'.$siswa->nis.'" id="hapus" class="btn btn-danger btn-sm">hapus</button>';
                })->toJson();
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(),
            [
                'nis' => 'required|unique:master_siswa'
            ]
        );

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
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
            return response()->json(['success'=>'Siswa Berhasil Ditambahkan']);
        }
    }
}
