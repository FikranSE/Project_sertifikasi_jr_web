<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Periksa;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Poli;

class PeriksaController extends Controller
{
    public function index(Request $request)
{
    // Ambil parameter pencarian dari input
    $search = $request->get('search');

    // Ambil data periksa yang sesuai dengan pencarian, paginate hasilnya
    $periksa = Periksa::with(['pasien', 'dokter.poli']) // Jika perlu relasi data pasien dan dokter
        ->when($search, function($query) use ($search) {
            // Mencari berdasarkan No_periksa, Nama Pasien, atau Diagnosa
            return $query->where('No_periksa', 'like', '%' . $search . '%')
                         ->orWhereHas('pasien', function($q) use ($search) {
                             $q->where('Pasien_nama', 'like', '%' . $search . '%');
                         })
                         ->orWhere('Diagnose', 'like', '%' . $search . '%');
        })
        ->paginate(2); // Pagination 10 data per halaman

    return view('periksa.index', compact('periksa'));
}

    
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    // Ambil data Pasien, Dokter, dan Poli
    $pasien = Pasien::all();  // Mendapatkan semua pasien
    $dokter = Dokter::all();
    $periksa = Periksa::all();  // Mendapatkan semua dokter
    $poli = Poli::all();      // Mendapatkan semua poli

    // Mengirimkan data ke view
    return view('periksa.create', compact('pasien', 'dokter', 'poli', 'periksa'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
{
    // Validasi input
    $request->validate([
        'No_periksa' => 'required|unique:periksa,No_periksa',
        'tanggal' => 'required|numeric|min:1|max:31', // Validate tanggal
        'bulan' => 'required|numeric|min:1|max:12', // Validate bulan
        'tahun' => 'required|numeric|min:1000|max:9999', // Validate tahun
        'Pasien_id' => 'required|exists:pasien,Pasien_id', // Pastikan ID Pasien benar
        'Dokter_id' => 'required|exists:dokter,Dokter_id', // Pastikan ID Dokter benar
        'Keluhan' => 'required|string',
        'Diagnose' => 'required|string',
        'Biaya_admin' => 'required|numeric',
    ]);

    // Menggabungkan tanggal, bulan, dan tahun menjadi Tgl_periksa
    $tglPeriksa = Carbon::createFromDate($request->tahun, $request->bulan, $request->tanggal)->format('Y-m-d');

    // Menyimpan data pemeriksaan baru
    Periksa::create([
        'No_periksa' => $request->No_periksa,
        'Tgl_periksa' => $tglPeriksa,
        'Pasien_id' => $request->Pasien_id,
        'Dokter_id' => $request->Dokter_id,
        'Keluhan' => $request->Keluhan,
        'Diagnose' => $request->Diagnose,
        'Biaya_admin' => $request->Biaya_admin,
    ]);

    // Redirect ke halaman daftar pemeriksaan dengan pesan sukses
    return redirect()->route('periksa.index')->with('success', 'Data pemeriksaan berhasil ditambahkan!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit(string $no_periksa)
    {
        // Mencari data berdasarkan No_periksa
        $periksa = Periksa::where('No_periksa', $no_periksa)->firstOrFail();
    
        // Memisahkan tanggal, bulan, dan tahun
        $periksa->tanggal = Carbon::parse($periksa->Tgl_periksa)->day;
        $periksa->bulan = Carbon::parse($periksa->Tgl_periksa)->month;
        $periksa->tahun = Carbon::parse($periksa->Tgl_periksa)->year;
    
        // Mengambil data pasien untuk dropdown (jika perlu)
        $pasien = Pasien::all();
        $dokter = Dokter::all();
    
        // Mengembalikan view dengan data periksa dan pasien
        return view('periksa.edit', compact('periksa', 'pasien', 'dokter'));
    }
    




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'No_periksa' => 'required|string|max:255',
            'tanggal' => 'required|numeric|min:1|max:31',
            'bulan' => 'required|numeric|min:1|max:12',
            'tahun' => 'required|numeric|digits:4',
            'Pasien_id' => 'required|exists:pasien,Pasien_id',
            'Dokter_id' => 'required|exists:dokter,Dokter_id',
            'Keluhan' => 'required|string|max:255',
            'Diagnose' => 'required|string|max:255',
            'Biaya_admin' => 'required|numeric|min:0',
        ]);
    
        // Mencari data yang ingin diupdate
        $periksa = Periksa::findOrFail($id);
    
        // Mengupdate data
        $periksa->No_periksa = $request->No_periksa;
        
        // Menggunakan Carbon untuk menyusun Tgl_periksa berdasarkan input tanggal, bulan, dan tahun
        $periksa->Tgl_periksa = Carbon::createFromDate($request->tahun, $request->bulan, $request->tanggal);
    
        $periksa->Pasien_id = $request->Pasien_id;
        $periksa->Dokter_id = $request->Dokter_id;
        $periksa->Keluhan = $request->Keluhan;
        $periksa->Diagnose = $request->Diagnose;
        $periksa->Biaya_admin = $request->Biaya_admin;
    
        // Menyimpan perubahan
        $periksa->save();
    
        // Redirect ke halaman yang diinginkan setelah berhasil update
        return redirect()->route('periksa.index')->with('success', 'Data Periksa berhasil diperbarui.');
    }
    
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    // Mencari data berdasarkan No_periksa
    $periksa = Periksa::where('No_periksa', $id)->first();

    // Mengecek apakah data ditemukan
    if ($periksa) {
        // Menghapus data
        $periksa->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('periksa.index')->with('success', 'Data Periksa berhasil dihapus');
    }

    // Jika data tidak ditemukan
    return redirect()->route('periksa.index')->with('error', 'Data Periksa tidak ditemukan');
}

}
