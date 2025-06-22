<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     // 

    //     $kategoris = Pembeli::latest()->paginate(5);
    //     return view('pembelis.index', compact('orders'))
    //         ->with('i', (request()->input('page', 1) - 1) * 5);
    // }
    public function __construct()
    {
        $this->middleware('permission:pembeli-list|pembeli-create|pembeli-edit|pembeli-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:pembeli-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:pembeli-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:pembeli-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pembeli::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '';

                    $btn .= '<a href="' . route('pembelis.show', $row->id) . '" class="btn btn-info btn-sm">Show</a> ';
                    if (Auth::user()->can('pembelis-show')) {
                    }

                    $btn .= '<a href="' . route('pembelis.edit', $row->id) . '" class="btn btn-warning btn-sm">Edit</a> ';
                    if (Auth::user()->can('pembelis-edit')) {
                    }

                    $btn .= '<form action="' . route('pembelis.destroy', $row->id) . '" method="POST" style="display:inline-block;" onsubmit="return confirm(\'Yakin ingin menghapus data ini?\')">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
                    if (Auth::user()->can('pembelis-delete')) {
                    }

                    return $btn;
                })->addColumn('foto', function ($row) {
                    if ($row->foto) {
                        return '<img src="' . asset($row->foto) . '" width="100" alt="Foto Pembeli">';
                    } else {
                        return '-';
                    }
                })
                ->rawColumns(['action', 'foto'])
                ->make(true);
        }

        return view('pembelis.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('pembelis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validated = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'nohp' => 'required',
            'foto' => 'required|image|mimes:png,jpeg,jpg|max:2048',
            'gender' => 'required',
            'tanggal_gabung' => 'required|date',
        ]);

        // dd($request->all());

        // Menyimpan file foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/pembeli', $filename);
            $validated['foto'] = 'storage/pembeli/' . $filename;
            $input['foto'] = $filename;
        }

        // Simpan data pembeli
        $validated['created_by'] = 1; // Ganti sesuai user login jika pakai auth

        Pembeli::create($validated);

        return redirect()->route('pembelis.index')
            ->with('success', 'Pembeli berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembeli $pembeli)
    {
        //

        return view('pembelis.show', compact('pembeli'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembeli $pembeli)
    {
        //

        return view('pembelis.edit', compact('pembeli'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembeli $pembeli)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'nohp' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gender' => 'required',
            'tanggal_gabung' => 'required|date',
        ]);

        $data = $request->except('foto');
        $data['created_by'] = 1; // ganti sesuai user login jika pakai auth

        // Handle file upload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($pembeli->foto && Storage::exists(str_replace('storage/', 'public/', $pembeli->foto))) {
                Storage::delete(str_replace('storage/', 'public/', $pembeli->foto));
            }

            // Simpan foto baru
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/pembeli', $filename);
            $data['foto'] = 'storage/pembeli/' . $filename;
        }

        // Update data
        $pembeli->update($data);

        return redirect()->route('pembelis.index')
            ->with('success', 'Pembeli berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembeli $pembeli)
    {
        // Hapus file foto jika ada
        if ($pembeli->foto && Storage::exists(str_replace('storage/', 'public/', $pembeli->foto))) {
            Storage::delete(str_replace('storage/', 'public/', $pembeli->foto));
        }

        // Hapus data dari database
        $pembeli->delete();

        return redirect()->route('pembelis.index')
            ->with('success', 'Pembeli berhasil dihapus beserta fotonya.');
    }
}
