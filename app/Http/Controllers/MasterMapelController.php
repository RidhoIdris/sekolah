<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterMapel;

class MasterMapelController extends Controller
{
    public function index(){
        return view("mapel.index");
    }

    public function show(){
        $mapels = MasterMapel::orderBy('created_at','DESC')->get();
        return Datatables($mapels)
                ->addIndexColumn()
                ->addColumn('action',function($mapels){
                    return '<button type="button" data-id="'.$mapels->id.'" id="edit" class="btn btn-primary btn-sm">Edit</button><button type="button" data-id="'.$mapels->id.'" id="hapus" class="btn btn-danger btn-sm">hapus</button>';
                })->toJson();
    }

    public function store(Request $request){
        $validator = \Validator::make($request->all(),
            [
                'nama_mapel' => 'required|max:50|unique:master_mapels,nama_mapel',
            ]
        );

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->first()],422);
        }else{
            MasterMapel::create([
                'nama_mapel'=> request('nama_mapel'),
            ]);
            return response()->json(['message'=>'Mata Pelajaran Berhasil Ditambahkan']);
        }
    }

    public function delete($id){
        MasterMapel::findOrFail($id)->delete($id);
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function edit($id){
        $mapels = MasterMapel::whereId($id)->first();
        return response()->json($mapels);
    }

    public function update(Request $request,$id){
        $validator = \Validator::make($request->all(),
            [
                'nama_mapel' => 'required|max:50|unique:master_mapels,nama_mapel,'.$id,
            ]
        );

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->first()],422);
        }else{
            MasterMapel::where(['id'=>$id])->update([
                'nama_mapel'=> request('nama_mapel'),
            ]);
            return response()->json(['message'=>'Mata Pelajaran Berhasil Diubah']);
        }
    }
}
