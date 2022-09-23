<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perizinan;
use App\Models\Krk;
use Auth;
use App\Models\Kelurahan;
use QueryException;
use Carbon\Carbon;
use Exception;
class KrkController extends Controller
{
    public function create()
    {
        $auth = Auth::user()->id;
        // $data = Subizin::where('jenis', 'krk')->distinct()->get('nama');
        // return $data;
        $old = Perizinan::where('user_id', $auth)->where('jenis_izin', 'krk')->where('status', null)->first();
        if(!$old) {
            $old = null;
        }
        // return $old;
        return view('user.krk.create', ['old' => $old]);
    } 

    public function tab1(Request $request)
    {
        $rules = [
            'nama' => 'required|string',
            'nik' => 'required|numeric',
            'nohp' => 'required|string',
            'alamat' => 'required|string',
        ];
        $message = [];
        $attribute = [
            'nama' => 'Nama',
            'nohp' => 'Nomor HP', 
            'nik' => 'NIK',  
            'alamat' => 'Alamat',
        ];
        $validasi = $this->validate($request,$rules,$message,$attribute);
        $auth = Auth::user()->id;
        $perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'krk')->get();
        foreach($perizinan as $i) {

            if($i->status == null) {
                Krk::where('perizinan_id', $i->id)->update(array(
                    'nama' => $request->nama,
                    'nohp' => $request->nohp,
                    'nik' => $request->nik,
                    'alamat' => $request->alamat
                ));
                return $arrayName = array(
                    'status' => 'success',
                    'pesan' => 'Berhasil Mengupdate!'
                );

            } elseif($i->status == '0' || $i->status == '2') {
                return $arrayName = array(
                    'status' => 'error',
                    'pesan' => 'Saat ini Anda memiliki pengajuan perizinan KRK! Silakan Cek di tab Surat Perizinan Anda!'
                );
            }
        }
        try {
            $no_tiket = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6));
            $izin = Perizinan::create(array(
                'user_id' => $auth,
                'jenis_izin' => 'krk',
                'status' => null,
                'no_tiket' => 'KRK-'.$no_tiket
            ));

            Krk::create(array(
                'perizinan_id' => $izin->id,
                'nama' => $request->nama,
                'nohp' => $request->nohp,
                'nik' => $request->nik,
                'alamat' => $request->alamat
            ));

            return $arrayName = array(
                'status' => 'success',
                'pesan' => 'Data disimpan!'
            );
        } catch(Exception $e) {
            return $arrayName = array(
                'status' => 'error',
                'pesan' => $e->getMessage()
            );
        } catch(QueryException $e) {
            return $arrayName = array(
                'status' => 'error',
                'pesan' => $e->getMessage()
            );
        }
    } // END TAB 1

    public function tab2(Request $request)
    {
        $rules = [
            'luas' => 'required|numeric',
            'nama_surat' => 'required|string',
            'nomor_surat' => 'required|string',
            'penggunaan' => 'required|string',
            'jenis' => 'required|string',
            'jml_lantai' => 'required|numeric',
            'jml_bangunan' => 'required|numeric',
        ];
        $message = [];
        $attribute = [
            'luas' => 'Luas', 
            'nama_surat' => 'Nama Pada Surat Tanah',
            'nomor_surat' => 'Nomor/Tanggal Pada Surat Tanah',
            'penggunaan' => 'Penggunaan/Fungsi Bangunan',
            'jenis' => 'Jenis Bangunan',
            'jml_lantai' => 'Jumlah Lantai',
            'jml_bangunan' => 'Jumlah Bangunan',
        ];
        $validasi = $this->validate($request,$rules,$message,$attribute);
        $auth = Auth::user()->id;
        $perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'krk')->get();
        foreach($perizinan as $i) {

            if($i->status == null) {
                Krk::where('perizinan_id', $i->id)->update(array(
                    'luas' => $request->luas,
                    'nama_surat' => $request->nama_surat,
                    'nomor_surat' => $request->nomor_surat,
                    'penggunaan' => $request->penggunaan,
                    'jenis' => $request->jenis,
                    'jml_lantai' => $request->jml_lantai,
                    'jml_bangunan' => $request->jml_bangunan,
                ));
                return $arrayName = array(
                    'status' => 'success',
                    'pesan' => 'Berhasil Mengupdate!'
                );

            } elseif($i->status == '0' || $i->status == '2') {
                return $arrayName = array(
                    'status' => 'error',
                    'pesan' => 'Saat ini Anda memiliki pengajuan perizinan KRK! Silakan Cek di tab Surat Perizinan Anda!'
                );
            }
        }

        try {
            $no_tiket = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6));
            $izin = Perizinan::create(array(
                'user_id' => $auth,
                'jenis_izin' => 'krk',
                'status' => null,
                'no_tiket' => 'KRK-'.$no_tiket
            ));

            Krk::create(array(
                'perizinan_id' => $izin->id,
                'luas' => $request->luas,
                'nama_surat' => $request->nama_surat,
                'nomor_surat' => $request->nomor_surat,
                'penggunaan' => $request->penggunaan,
                'jenis' => $request->jenis,
                'jml_lantai' => $request->jml_lantai,
                'jml_bangunan' => $request->jml_bangunan,
            ));

            return $arrayName = array(
                'status' => 'success',
                'pesan' => 'Data disimpan!'
            );
        } catch(Exception $e) {
            return $arrayName = array(
                'status' => 'error',
                'pesan' => $e->getMessage()
            );
        } catch(QueryException $e) {
            return $arrayName = array(
                'status' => 'error',
                'pesan' => $e->getMessage()
            );
        }
    }
    // END TAB 2

    public function tab3(Request $request)
    {
        $rules = [
            'kelurahan' => 'required|string',
            'jalan' => 'required|string',
        ];
        $message = [];
        $attribute = [
            'kelurahan' => 'Kelurahan', 
            'jalan' => 'Jalan',

        ];
        $validasi = $this->validate($request,$rules,$message,$attribute);
        $auth = Auth::user()->id;
        $perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'krk')->get();
        foreach($perizinan as $i) {
            if($i->status == null) {
                Krk::where('perizinan_id', $i->id)->update(array(
                    'kelurahan' => $request->kelurahan,
                    'jalan' => $request->jalan,
                ));
                return $arrayName = array(
                    'status' => 'success',
                    'pesan' => 'Berhasil Mengupdate!'
                );

            } elseif($i->status == '0' || $i->status == '2') {
                return $arrayName = array(
                    'status' => 'error',
                    'pesan' => 'Saat ini Anda memiliki pengajuan perizinan KRK! Silakan Cek di tab Surat Perizinan Anda!'
                );
            }
        }

        try {
            $no_tiket = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6));
            $izin = Perizinan::create(array(
                'user_id' => $auth,
                'jenis_izin' => 'krk',
                'status' => null,
                'no_tiket' => 'KRK-'.$no_tiket
            ));

            Krk::create(array(
                'perizinan_id' => $izin->id,
                'kelurahan' => $request->kelurahan,
                'jalan' => $request->jalan,
            ));

            return $arrayName = array(
                'status' => 'success',
                'pesan' => 'Data disimpan!'
            );
        } catch(Exception $e) {
            return $arrayName = array(
                'status' => 'error',
                'pesan' => $e->getMessage()
            );
        } catch(QueryException $e) {
            return $arrayName = array(
                'status' => 'error',
                'pesan' => $e->getMessage()
            );
        }
    }
    // END TAB 3

    public function tab4(Request $request)
    {
        $message = [];
        $attribute = [];
        
        $auth = Auth::user()->id;
        $perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'krk')->get();
        foreach($perizinan as $i) {

            if($i->status == null) {
                // upload KTP
                if($request->key == 'ktp') {
                    $ktp = $request->file('ktp'); 
                    if ($ktp) {
                        $validasi = $this->validate($request, [
                            'ktp' => 'image|mimes:jpeg,png,jpg|max:1024',
                        ],$message,$attribute);
                        $krk = Krk::where('perizinan_id', $i->id)->first();
                        if ($krk->ktp && file_exists(storage_path('app/public/' . $krk->ktp))) {
                            \Storage::delete('public/' . $krk->ktp);
                        }
                        $path = $ktp->store('krk', 'public');
                        $krk->ktp = $path;
                        $krk->save();
                        return $arrayName = array(
                            'status' => 'success',
                            'pesan' => 'KTP disimpan!'
                        );
                    }
                    return $arrayName = array(
                        'status' => 'error',
                        'pesan' => 'KTP tidak diproses!',
                    );  
                } // end upload ktp

                // upload PBB
                if($request->key == 'pbb') {
                    $pbb = $request->file('pbb'); 
                    if ($pbb) {
                        $validasi = $this->validate($request, [
                            'pbb' => 'image|mimes:jpeg,png,jpg|max:1024',
                        ],$message,$attribute);
                        $krk = Krk::where('perizinan_id', $i->id)->first();
                        if ($krk->pbb && file_exists(storage_path('app/public/' . $krk->pbb))) {
                            \Storage::delete('public/' . $krk->pbb);
                        }
                        $path = $pbb->store('krk', 'public');
                        $krk->pbb = $path;
                        $krk->save();
                        return $arrayName = array(
                            'status' => 'success',
                            'pesan' => 'PBB disimpan!'
                        );
                    }
                    return $arrayName = array(
                        'status' => 'error',
                        'pesan' => 'PBB tidak diproses!',
                    );  
                } // end upload PBB

                // upload Surat Tanah
                if($request->key == 'surat_tanah') {
                    $surat_tanah = $request->file('surat_tanah'); 
                    if ($surat_tanah) {
                        $validasi = $this->validate($request, [
                            'surat_tanah' => 'image|mimes:jpeg,png,jpg|max:1024',
                        ],$message,$attribute);
                        $krk = Krk::where('perizinan_id', $i->id)->first();
                        if ($krk->surat_tanah && file_exists(storage_path('app/public/' . $krk->surat_tanah))) {
                            \Storage::delete('public/' . $krk->surat_tanah);
                        }
                        $path = $surat_tanah->store('krk', 'public');
                        $krk->surat_tanah = $path;
                        $krk->save();
                        return $arrayName = array(
                            'status' => 'success',
                            'pesan' => 'Surat tanah disimpan!'
                        );
                    }
                    return $arrayName = array(
                        'status' => 'error',
                        'pesan' => 'Surat tanah tidak diproses!',
                    );  
                } // end upload Surat Tanah

                // upload Peta
                if($request->key == 'peta') {
                    $peta = $request->file('peta'); 
                    if ($peta) {
                        $validasi = $this->validate($request, [
                            'peta' => 'image|mimes:jpeg,png,jpg|max:1024',
                        ],$message,$attribute);
                        $krk = Krk::where('perizinan_id', $i->id)->first();
                        if ($krk->peta && file_exists(storage_path('app/public/' . $krk->peta))) {
                            \Storage::delete('public/' . $krk->peta);
                        }
                        $path = $peta->store('krk', 'public');
                        $krk->peta = $path;
                        $krk->save();
                        return $arrayName = array(
                            'status' => 'success',
                            'pesan' => 'Peta lokasi disimpan!'
                        );
                    }
                    return $arrayName = array(
                        'status' => 'error',
                        'pesan' => 'peta tidak diproses!',
                    );  
                } // end upload Peta

                // upload Gambar
                if($request->key == 'gambar') {
                    $gambar = $request->file('gambar'); 
                    if ($gambar) {
                        $validasi = $this->validate($request, [
                            'gambar' => 'image|mimes:jpeg,png,jpg|max:1024',
                        ],$message,$attribute);
                        $krk = Krk::where('perizinan_id', $i->id)->first();
                        if ($krk->gambar && file_exists(storage_path('app/public/' . $krk->gambar))) {
                            \Storage::delete('public/' . $krk->gambar);
                        }
                        $path = $gambar->store('krk', 'public');
                        $krk->gambar = $path;
                        $krk->save();
                        return $arrayName = array(
                            'status' => 'success',
                            'pesan' => 'Gambar bangunan rencana disimpan!'
                        );
                    }
                    return $arrayName = array(
                        'status' => 'error',
                        'pesan' => 'Gambar bangunan rencana tidak diproses!',
                    );  
                } // end upload Gambar

                // upload berkas pendukung
                if($request->key == 'berkas_pendukung') {
                    $berkas_pendukung = $request->file('berkas_pendukung'); 
                    if ($berkas_pendukung) {
                        $validasi = $this->validate($request, [
                            'berkas_pendukung' => 'mimes:pdf|max:1024',
                        ],$message,$attribute);
                        $krk = Krk::where('perizinan_id', $i->id)->first();
                        if ($krk->berkas_pendukung && file_exists(storage_path('app/public/' . $krk->berkas_pendukung))) {
                            \Storage::delete('public/' . $krk->berkas_pendukung);
                        }
                        $path = $berkas_pendukung->store('pendidikan', 'public');
                        $krk->berkas_pendukung = $path;
                        $krk->save();
                        return $arrayName = array(
                            'status' => 'success',
                            'pesan' => 'Berkas pendukung disimpan!',
                        );
                    }
                    return $arrayName = array(
                        'status' => 'error',
                        'pesan' => 'Berkas pendukung tidak diproses!'
                    );  
                } // end upload berkas pendukung

            } elseif($i->status == '0' || $i->status == '2') {
                return $arrayName = array(
                    'status' => 'error',
                    'pesan' => 'Saat ini Anda memiliki pengajuan perizinan KRK! Silakan Cek di tab Surat Perizinan Anda!'
                );
            }
        }
    } //END TAB 4


    public function tab5(Request $request)
    {
        try {
            $time = Carbon::now();
            $auth = Auth::user()->id;
            $perizinan = Perizinan::where('user_id', $auth)->where('jenis_izin', 'krk')->get();
            foreach($perizinan as $i) {
                if($i->status == null) {
                    $cek = krk::where('perizinan_id', $i->id)->first();
                    if($cek->nama == '') { return $this->err('Nama'); }
                    if($cek->nik == '') { return $this->err('Nomor KTP (NIK)'); }
                    if($cek->nohp == '') { return $this->err('No HP'); }
                    if($cek->alamat == '') { return $this->err('Alamat'); }
                    if($cek->luas == '') { return $this->err('Luasan Tanah'); }
                    if($cek->nama_surat == '') { return $this->err('Nama Pada Surat Tanah'); }
                    if($cek->nomor_surat == '') { return $this->err('Nomor/Tanggal Pada Surat Tanah'); }
                    if($cek->penggunaan == '') { return $this->err('Penggunaan'); }
                    if($cek->jenis == '') { return $this->err('Jenis'); }
                    if($cek->jml_lantai == '') { return $this->err('Jumlah Lantai'); }
                    if($cek->jml_bangunan == '') { return $this->err('Jumlah Bangunan'); }
                    if($cek->kelurahan == '') { return $this->err('Kelurahan'); }
                    if($cek->jalan == '') { return $this->err('Jalan'); }
                    if($cek->ktp == '') { return $this->err('KTP'); }
                    if($cek->pbb == '') { return $this->err('PBB Terakhir'); }
                    if($cek->surat_tanah == '') { return $this->err('Surat Tanah'); }
                    if($cek->peta == '') { return $this->err('Peta Lokasi (Koordinat X dan Y)'); }
                    if($cek->gambar == '') { return $this->err('Gambar Bangunan Rencana'); }
                    Perizinan::where('id', $i->id)->update(array(
                        'status' => '0',
                        'created_at' => $time
                    ));
                    return $arrayName = array(
                        'status' => 'success',
                        'pesan' => 'Berhasil Mengirim Berkas!'
                    );

                } elseif($i->status == '0' || $i->status == '2') {
                    return $arrayName = array(
                        'status' => 'error',
                        'pesan' => 'Saat ini Anda memiliki pengajuan perizinan Keterangan Rencana Kota (KRK)! Silakan Cek di tab Surat Perizinan Anda!'
                    );
                }
            }

            return $arrayName = array(
                'status' => 'error',
                'pesan' => 'Mohon isi semua form!'
            );
        } catch(Exception $e) {
            return $arrayName = array(
                'status' => 'error',
                'pesan' => $e->getMessage()
            );
        } catch(QueryException $e) {
            return $arrayName = array(
                'status' => 'error',
                'pesan' => $e->getMessage()
            );
        }
        
    }
    // END TAB 5

    public function reload($id)
    {
        $data = Krk::find($id);
        return $data;

    }

    private function err($pesan) 
    {   
        return $err = array(
            'status' => 'error',
            'pesan' => 'Mohon mengisi '.$pesan
        );
    }
}
