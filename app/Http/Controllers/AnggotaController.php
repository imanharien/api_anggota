<?php

namespace App\Http\Controllers;

use App\Anggota; //File Model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Carbon;

class AnggotaController extends Controller
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
        //$data = Anggota::all();
        $data = DB::table('data_anggota')
                    ->select('data_anggota.id as id_anggota','nama','nim','tgl_lahir','alamat','telepon','jurusan','fakultas','nama_departemen')
                    ->join('data_departemen','data_departemen.id','=','data_anggota.id_departemen')
                    ->get();
        
        return response($data);
    }
    public function show($id)
    {
        //$data = Anggota::where('id', $id)->get();
        $data = DB::table('data_anggota')
                    ->select('data_anggota.id as id_anggota','nama','nim','tgl_lahir','alamat','telepon','jurusan','fakultas','nama_departemen')
                    ->join('data_departemen','data_departemen.id','=','data_anggota.id_departemen')
                    ->where('data_anggota.id', $id)
                    ->get();
        
        return response($data);
    }
    public function store(Request $request)
    {
        $data                 = new Anggota();
        $data->id_departemen  = $request->input('id_departemen');
        $data->nim            = $request->input('nim');
        $data->nama           = $request->input('nama');
        $data->tgl_lahir      = $request->input('tgl_lahir');
        $data->alamat         = $request->input('alamat');
        $data->telepon        = $request->input('telepon');
        $data->jurusan        = $request->input('jurusan');
        $data->fakultas       = $request->input('fakultas');
        $data->save();

        return response('Berhasil Tambah Data');
    }
    public function update(Request $request, $id)
    {
        $data               = Anggota::where('id', $id)->first();
        $data->id_departemen  = $request->input('id_departemen');
        $data->nim            = $request->input('nim');
        $data->nama           = $request->input('nama');
        $data->tgl_lahir      = $request->input('tgl_lahir');
        $data->alamat         = $request->input('alamat');
        $data->telepon        = $request->input('telepon');
        $data->jurusan        = $request->input('jurusan');
        $data->fakultas       = $request->input('fakultas');
        $data->save();

        return response('Berhasil Merubah Data');
    }

    public function destroy($id)
    {
        $data = Anggota::where('id', $id)->first();
        $data->delete();

        return response('Berhasil Menghapus Data');
    }
}