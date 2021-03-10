<?php

namespace App\Http\Controllers;

use App\Kegiatan; //File Model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class KegiatanController extends Controller
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
        //$data = Kegiatan::all();
        $data = DB::table('data_kegiatan')
                    ->select('id','nama_kegiatan','waktu','deskripsi')
                    ->get();

        return response($data);
    }
    public function show($id)
    {
        //$data = Kegiatan::where('id', $id)->get();
        $data = DB::table('data_kegiatan')
                    ->select('id','nama_kegiatan','waktu','deskripsi')
                    ->where('id', $id)
                    ->get();

        return response($data);
    }
    public function store(Request $request)
    {
        $data                   = new Kegiatan();
        $data->nama_kegiatan    = $request->input('nama_kegiatan');
        $data->waktu            = $request->input('waktu');
        $data->deskripsi        = $request->input('deskripsi');
        $data->save();

        return response('Berhasil Tambah Data');
    }
    public function update(Request $request, $id)
    {
        $data                   = Kegiatan::where('id', $id)->first();
        $data->nama_kegiatan    = $request->input('nama_kegiatan');
        $data->waktu            = $request->input('waktu');
        $data->deskripsi        = $request->input('deskripsi');
        $data->save();

        return response('Berhasil Merubah Data');
    }

    public function destroy($id)
    {
        $data = Kegiatan::where('id', $id)->first();
        $data->delete();

        return response('Berhasil Menghapus Data');
    }
}