<?php

namespace App\Http\Controllers;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Walas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function loginWalas(Request $request){
        $walas = Walas::where('nig',$request->txt_nig)->first();
        if(!$walas || !Hash::check($request->txt_pass,$walas->password)){
            return redirect()->back()->with('error','Password atau Ussername Salah');
        }
        $kelas = Kelas::where('id',$walas->kelas_id)->first();
        session([
            'role' => 'Walas',
            'id' => $walas->kelas_id,
            'nama' => $walas->nama_walas,
            'nig' => $walas->nig,
            'kelas_id' => $walas->kelas_id,
            'namakelas' => $kelas->nama_kelas
        ]);
        return redirect('nilai-raport/index');
    }
    public function loginSiswa(Request $request){
        $siswa = Siswa::where('nis',$request->txt_nis)->first();
        if(!$siswa || !Hash::check($request->txt_pass,$siswa->password)){
            return redirect()->back()->with('error','Password atau NIS Salah');
        }
        $kelas = Kelas::where('id',$siswa->kelas_id)->first();
        session([
            'role' => 'Murid',
            'id' => $siswa->id,
            'nis' => $siswa->nis,
            'nama' => $siswa->nama_siswa,
            'kelas_id' => $siswa->kelas_id,
            'namakelas' => $siswa ? $kelas->nama_kelas : 'Kelas Belum ditentukan'
        ]);
        return redirect('nilai-raport/show');
    }
    public function logout(){
        session()->flush();
        return redirect('/');
    }
}
