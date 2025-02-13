<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->has('search')) {
            $alumni = Alumni::where('nis', 'like', '%'.$request->search.'%')->paginate(5);
        }else{
            $alumni = Alumni::paginate(5);
        }

        return view('alumni', compact('alumni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        // Mencari alumni berdasarkan ID
        $data = Alumni::find($id); // Gunakan find() bukan findOrFail()
    
        // Cek jika data ditemukan
        if (!$data) {
            return redirect()->back()->with('error', 'Alumni dengan ID tersebut tidak ditemukan.');
        }
    
        $status_map = [1 => 'Bekerja', 2 => 'Kuliah', 3 => 'Tidak Ada Kabar'];
        $jalur_map = [1 => 'PTN', 2 => 'PTS', 3 => 'DINAS'];
    
        $pdf = PDF::loadView('invoice', compact('data', 'status_map', 'jalur_map'));
    
        return $pdf->stream();
    }
    


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nis' => 'required|numeric|unique:alumnis,nis',
            'nama_lengk' => 'required|string|max:255',
            'jur_sekolah' => 'required|string|max:255',
            'tahun_lulus' => 'nullable|string',
            'nomor_telp' => 'required|numeric',
            'alamat_rum' => 'required|string',
            'wirausaha' => 'nullable|string|max:255',
            'status' => 'required|in:1,2,3', // 1 = Bekerja, 2 = Kuliah, 3 = Tidak Ada Kabar
            'nama_per' => 'nullable|required_if:status,1|string|max:255',
            'nama_tok' => 'nullable|required_if:status,1|string|max:255',
            'lok_bekerja' => 'nullable|required_if:status,1|string|max:255',
            'jalur' => 'nullable|in:1,2,3|required_if:status,2',  // 1 = PTN, 2 = PTS, 3 = DINAS
            'nama_perti' => 'nullable|required_if:status,2|string|max:255',
            'jur_prodi' => 'nullable|required_if:status,2|string|max:255',
            'lok_kuliah' => 'nullable|required_if:status,2|string|max:255',
        ]);

        // Map status to descriptive text
        $status_map = [1 => 'Bekerja', 2 => 'Kuliah', 3 => 'Tidak Ada Kabar'];
        $status_value = $status_map[$request->status];

        // Map jalur to descriptive text (only if status is Kuliah)
        $jalur_map = [1 => 'PTN', 2 => 'PTS', 3 => 'DINAS'];
        $jalur_value = $request->status == 2 ? $jalur_map[$request->jalur] : null;

        $alumni = Alumni::create([
            'nis' => $request->input('nis'),
            'nama_lengk' => $request->input('nama_lengk'),
            'jur_sekolah' => $request->input('jur_sekolah'),
            'tahun_lulus' => $request->input('tahun_lulus'),
            'nomor_telp' => $request->input('nomor_telp'),
            'alamat_rum' => $request->input('alamat_rum'),
            'wirausaha' => $request->input('wirausaha'),
            'status' => $request->input('status'),
            'nama_per' => $request->input('status') == 1 ? $request->input('nama_per') : null,
            'nama_tok' => $request->input('status') == 1 ? $request->input('nama_tok') : null,
            'lok_bekerja' => $request->input('status') == 1 ? $request->input('lok_bekerja') : null,
            'jalur' => $request->input('status') == 2 ? $request->input('jalur') : null,
            'nama_perti' => $request->input('status') == 2 ? $request->input('nama_perti') : null,
            'jur_prodi' => $request->input('status') == 2 ? $request->input('jur_prodi') : null,
            'lok_kuliah' => $request->input('status') == 2 ? $request->input('lok_kuliah') : null,
        ]);

        if($alumni) {
            return redirect('alumni')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect('alumni')->with(['error' => 'Data Gagal Disimpan']);
        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'nis' => 'required|numeric',
            'nama_lengk' => 'required|string|max:255',
            'jur_sekolah' => 'required|string|max:255',
            'tahun_lulus' => 'nullable|string',
            'nomor_telp' => 'required|numeric',
            'alamat_rum' => 'required|string',
            'wirausaha' => 'nullable|string|max:255',
            'status' => 'required|in:1,2,3', // 1 = Bekerja, 2 = Kuliah, 3 = Tidak Ada Kabar
            'nama_per' => 'nullable|required_if:status,1|string|max:255',
            'nama_tok' => 'nullable|required_if:status,1|string|max:255',
            'lok_bekerja' => 'nullable|required_if:status,1|string|max:255',
            'jalur' => 'nullable|in:1,2,3|required_if:status,2',  // 1 = PTN, 2 = PTS, 3 = DINAS
            'nama_perti' => 'nullable|required_if:status,2|string|max:255',
            'jur_prodi' => 'nullable|required_if:status,2|string|max:255',
            'lok_kuliah' => 'nullable|required_if:status,2|string|max:255',
        ]);

        // Map status to descriptive text
        $status_map = [1 => 'Bekerja', 2 => 'Kuliah', 3 => 'Tidak Ada Kabar'];
        $status_value = $status_map[$request->status];

        // Map jalur to descriptive text (only if status is Kuliah)
        $jalur_map = [1 => 'PTN', 2 => 'PTS', 3 => 'DINAS'];
        $jalur_value = $request->status == 2 ? $jalur_map[$request->jalur] : null;

        $alumni = Alumni::findOrFail($id);
        $alumni->update([
            'nis' => $request->input('nis'),
            'nis' => $request->input('nis'),
            'nama_lengk' => $request->input('nama_lengk'),
            'jur_sekolah' => $request->input('jur_sekolah'),
            'tahun_lulus' => $request->input('tahun_lulus'),
            'nomor_telp' => $request->input('nomor_telp'),
            'alamat_rum' => $request->input('alamat_rum'),
            'wirausaha' => $request->input('wirausaha'),
            'status' => $request->input('status'),
            'nama_per' => $request->input('status') == 1 ? $request->input('nama_per') : null,
            'nama_tok' => $request->input('status') == 1 ? $request->input('nama_tok') : null,
            'lok_bekerja' => $request->input('status') == 1 ? $request->input('lok_bekerja') : null,
            'jalur' => $request->input('status') == 2 ? $request->input('jalur') : null,
            'nama_perti' => $request->input('status') == 2 ? $request->input('nama_perti') : null,
            'jur_prodi' => $request->input('status') == 2 ? $request->input('jur_prodi') : null,
            'lok_kuliah' => $request->input('status') == 2 ? $request->input('lok_kuliah') : null,
        ]);


        if($alumni) {
            return redirect('alumni')->with(['update' => 'Data Berhasil Di Update']);
        } else {
            return redirect('alumni')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $alumni = Alumni::findOrFail($id);
        $alumni->delete();

        if($alumni) {
            return redirect('alumni')->with(['delete' => 'Data Berhasil Didelete']);
        } else {
            return redirect('alumni')->with(['error' => 'Data Gagal Dihapus']);
        }
    }
}
