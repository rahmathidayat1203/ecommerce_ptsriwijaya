<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendaftaranHaji;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;


class PendaftaranHajiController extends Controller
{
    public function showForm()
    {
        return view('pendaftaran_haji');
    }

    public function submitForm(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'nomor_ktp' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
            'kewarganegaraan' => 'required|string|max:100',
            'desa_kelurahan' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'provinsi' => 'required|string|max:100',
            'kode_pos' => 'required|numeric',
            'pergi_haji' => 'required|in:Pertama,Berulang',
            'nama_mahram' => 'required|string|max:255',
            'no_pendaftaran_mahram' => 'required|string|max:50',
            'golongan_darah' => 'required|in:A,B,AB,O',
            'status_jamaah' => 'required|in:Biasa,Khusus',
            'status_perkawinan' => 'required|in:Belum Menikah,Menikah,Janda/Duda',
            'kode_diagnosis' => 'required|string|max:50',
            'ciri_ciri' => 'required|string|max:1000',
        ]);

        $create = PendaftaranHaji::create($request->all());
        return redirect()->back()->with('success', 'Pendaftaran berhasil!');
    }
    public function __construct()
    {
        $this->middleware('permission:pembeli-list|pembeli-edit|pembeli-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:pembeli-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:pembeli-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PendaftaranHaji::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '';

                    $btn .= '<a href="' . route('pendaftaranhajis.show', $row->id) . '" class="btn btn-info btn-sm">Show</a> ';
                    if (Auth::user()->can('pembelis-show')) {
                    }

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pendaftaranhajis.index');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validated = $request->validate([
            'nomor_ktp' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
            'kewarganegaraan' => 'required|string|max:100',
            'desa_kelurahan' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'provinsi' => 'required|string|max:100',
            'kode_pos' => 'required|numeric',
            'pergi_haji' => 'required|in:Pertama,Berulang',
            'nama_mahram' => 'required|string|max:255',
            'no_pendaftaran_mahram' => 'required|string|max:50',
            'golongan_darah' => 'required|in:A,B,AB,O',
            'status_jamaah' => 'required|in:Biasa,Khusus',
            'status_perkawinan' => 'required|in:Belum Menikah,Menikah,Janda/Duda',
            'kode_diagnosis' => 'required|string|max:50',
            'ciri_ciri' => 'required|string|max:1000',
        ]);
    }

    public function show(PendaftaranHaji $pendaftaranhaji)
    {
        //

        return view('pendaftaranhajis.show', compact('pendaftaranhaji'));
    }

    /**
     * Show the form for editing the specified resource.
     */



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PendaftaranHaji $pendaftaranhaji)
    {

        // Hapus data dari database
        $pendaftaranhaji->delete();

        return redirect()->route('pendaftaranhajis.index')
            ->with('success', 'pendaftaranhaji berhasil dihapus.');
    }
}
