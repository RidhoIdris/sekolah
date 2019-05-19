<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;

class JurusanController extends Controller
{
    public function index(){
        return view("jurusan.index");
    }

    public function show(){
        $jurusans = Jurusan::orderBy('created_at','DESC')->get();
        return Datatables($jurusans)
                ->addIndexColumn()
                ->addColumn('action',function($jurusans){
                    return '<button type="button" data-id="'.$jurusans->id.'" id="edit" class="btn btn-primary btn-sm">Edit</button><button type="button" data-id="'.$jurusans->id.'" id="hapus" class="btn btn-danger btn-sm">hapus</button>';
                })->toJson();
    }

    public function store(Request $request){
        $validator = \Validator::make($request->all(),
            [
                'nama_jurusan' => 'required|max:50|unique:jurusans,nama_jurusan',
            ]
        );

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->first()],422);
        }else{
            Jurusan::create([
                'nama_jurusan'=> request('nama_jurusan'),
            ]);
            return response()->json(['message'=>'Jurusan Berhasil Ditambahkan']);
        }
    }

    public function delete($id){
        Jurusan::findOrFail($id)->delete($id);
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function edit($id){
        $jurusans = Jurusan::whereId($id)->first();
        return response()->json($jurusans);
    }

    public function update(Request $request,$id){
        $validator = \Validator::make($request->all(),
            [
                'nama_jurusan' => 'required|max:50|unique:jurusans,nama_jurusan,'.$id,
            ]
        );

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->first()],422);
        }else{
            Jurusan::where(['id'=>$id])->update([
                'nama_jurusan'=> request('nama_jurusan'),
            ]);
            return response()->json(['message'=>'Kelas Berhasil Diubah']);
        }
    }
}
