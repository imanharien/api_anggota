<?php

namespace App\Http\Controllers;

use App\Departemen; //File Model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class DepartemenController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$data = Departemen::all();
        $data = DB::table('data_departemen')
                    ->select('id','nama_departemen')
                    ->get();

        return response($data);
    }
    public function show($id)
    {
        //$data = Departemen::where('id', $id)->get();
        $data = DB::table('data_departemen')
                    ->select('id','nama_departemen')
                    ->where('id', $id)
                    ->get();

        return response($data);
    }
    public function store(Request $request)
    {
        $data                   = new Departemen();
        $data->nama_departemen  = $request->input('nama_departemen');
        $data->deskripsi        = $request->input('deskripsi');
        $data->save();

        return response('Berhasil Tambah Data');
    }
    public function update(Request $request, $id)
    {
        $data               = Departemen::where('id', $id)->first();
        $data->nama_departemen  = $request->input('nama_departemen');
        $data->deskripsi        = $request->input('deskripsi');
        $data->save();

        return response('Berhasil Merubah Data');
    }

    public function destroy($id)
    {
        $data = Departemen::where('id', $id)->first();
        $data->delete();

        return response('Berhasil Menghapus Data');
    }
}