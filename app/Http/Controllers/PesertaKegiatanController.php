<?php

namespace App\Http\Controllers;

use App\PesertaKegiatan; //File Model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PesertaKegiatanController extends Controller
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
        //$data = PesertaKegiatan::all();
        $data = DB::table('data_peserta_kegiatan')
                    ->select('data_peserta_kegiatan.id','data_anggota.nama as nama_anggota','data_kegiatan.nama_kegiatan','keterangan')
                    ->join('data_anggota','data_anggota.id','=','data_peserta_kegiatan.id_anggota')
                    ->join('data_kegiatan','data_kegiatan.id','=','data_peserta_kegiatan.id_kegiatan')
                    ->get();

        return response($data);
    }
    public function show($id)
    {
        //$data = PesertaKegiatan::where('id', $id)->get();
        $data = DB::table('data_peserta_kegiatan')
                    ->select('data_peserta_kegiatan.id','data_anggota.nama as nama_anggota','data_kegiatan.nama_kegiatan','keterangan')
                    ->join('data_anggota','data_anggota.id','=','data_peserta_kegiatan.id_anggota')
                    ->join('data_kegiatan','data_kegiatan.id','=','data_peserta_kegiatan.id_kegiatan')
                    ->where('data_kegiatan.id', $id)
                    ->get();

        return response($data);
    }
    public function store(Request $request)
    {
        $data               = new PesertaKegiatan();
        $data->id_anggota   = $request->input('id_anggota');
        $data->id_kegiatan  = $request->input('id_kegiatan');
        $data->keterangan   = $request->input('keterangan');
        $data->save();

        return response('Berhasil Tambah Data');
    }
    public function update(Request $request, $id)
    {
        $data               = PesertaKegiatan::where('id', $id)->first();
        $data->id_anggota   = $request->input('id_anggota');
        $data->id_kegiatan  = $request->input('id_kegiatan');
        $data->keterangan   = $request->input('keterangan');
        $data->save();

        return response('Berhasil Merubah Data');
    }

    public function destroy($id)
    {
        $data = PesertaKegiatan::where('id', $id)->first();
        $data->delete();

        return response('Berhasil Menghapus Data');
    }
}