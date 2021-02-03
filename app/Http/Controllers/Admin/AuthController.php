<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\UsersModel;
use App\models\AlamatUserModel;
use Auth;

class AuthController extends Controller{
    function index(){
        if(Auth::check()){
            $data = Auth::user();
            return redirect()->intended(route($data->akses.'_dashboard'));
        }
    	return view('login');
    }

    function submit(Request $req){
    	$this->validate($req,[
    		'user' => 'required',
    		'pwd' => 'required',
    	],[],[
    		'user' => 'Username \ Email',
    		'pwd' => 'Password'
    	]);
    	if(Auth::attempt(['email'=>$req->user,'password'=>$req->pwd,'status'=>1])){
    		$data = Auth::user();
    		return redirect()->intended(route($data->akses.'_dashboard'));
    	}else return redirect()->back()->withInput()->withErrors('Username atau password salah. mohon periksa kembali.');

    }

    function register(){
        if(Auth::check()){
            $data = Auth::user();
            return redirect()->intended(route($data->akses.'_dashboard'));
        }
        return view('front.register');
    }

    function submitRegister(Request $req){
        $this->validate($req,[
            'nama' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'akses' => 'required',
            'nama_alamat' => 'required',
            "prov_id" => 'required',
            "prov_nama" => 'required',
            "kota_id" => 'required',
            "kota_nama" => 'required',
            "kec_id" => 'required',
            "kec_nama" => 'required',
            "alamat" => 'required',
            "pwd" => 'min:6|required_with:confirm_pwd|same:confirm_pwd',
            "confirm_pwd" => 'min:6',
        ],[],[
            'nama' => 'Nama Lengkap',
            'email' => 'E-Mail',
            'telp' => 'No. HP / Telp.',
            'akses' => 'Pendaftaran Sebagai Mitra',
            'nama_alamat' => 'Nama Alamat',
            "prov_id" => 'Provinsi',
            "prov_nama" => 'Provinsi',
            "kota_id" => 'Kota / Kabupaten',
            "kota_nama" => 'Kota / Kabupaten',
            "kec_id" => 'Kecamatan',
            "kec_nama" => 'Kecamatan',
            "alamat" => 'Alamat Lengkap',
            "pwd" => 'Password',
            "confirm_pwd" => 'Konfirmasi Password'
        ]);
        $data = UsersModel::where('email',$req->email)->orWhere('telp',$req->telp)->count();
        if($data==0){
            $data = new UsersModel;
            $data->user_id = UsersModel::UID();
            $data->nama = $req->nama;
            $data->email = $req->email;
            $data->telp = $req->telp;
            $data->akses = $req->akses;
            $data->status = 99;
            $data->password = $req->pwd;
            if($data->save()){
                $alm = new AlamatUserModel;
                $alm->alamat_id = AlamatUserModel::UID();
                $alm->user_id = $data->user_id;
                $alm->nama_alamat = $req->nama_alamat;
                $alm->prov_id = $req->prov_id;
                $alm->kota_id = $req->kota_id;
                $alm->kec_id = $req->kec_id;
                $alm->alamat = $req->alamat;
                $alm->kode_pos = $req->kode_pos;
                $alm->nm_prov = $req->prov_nama;
                $alm->nm_kota = $req->kota_nama;
                $alm->nm_kec = $req->kec_nama;
                if($alm->save()){
                    return redirect('/')->with('success','Data Berhasil diSimpan.');
                }else{
                    return redirect('/')->with('success','Data Berhasil diSimpan.')->withErrors('Data Alamat Gagal diSimpan.');
                }
            }else return redirect()->back()->withInput()->withErrors('Terjadi Kesalahan pada Server. Data Gagal diSimpan.');

        }else return redirect()->back()->withInput()->withErrors('E-Mail / No. Telp sudah didaftarkan. Mohon Periksa Kembali Form Isian Anda.');
    }

    function logout(){
    	if(Auth::check()){
    		Auth::logout();
    	}
    	return redirect('/');
    }
}
