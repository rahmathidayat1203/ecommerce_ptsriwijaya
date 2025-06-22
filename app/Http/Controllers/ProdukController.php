<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     // 

    //     $kategoris = Produk::latest()->paginate(5);
    //     return view('produks.index', compact('produks'))
    //         ->with('i', (request()->input('page', 1) - 1) * 5);
    // }

    public function __construct()
    {
        $this->middleware('permission:produk-list|produk-create|produk-edit|produk-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:produk-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:produk-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:produk-delete', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Produk::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $buttons = [];

                    $buttons[] = '<a href="' . route('produks.show', $row->id) . '" class="btn btn-info btn-sm">Show</a>';
                    if (Auth::user()->can('produk-show')) {
                    }

                    if (Auth::user()->can('produk-edit')) {
                        $buttons[] = '<a href="' . route('produks.edit', $row->id) . '" class="btn btn-warning btn-sm">Edit</a>';
                    }

                    if (Auth::user()->can('produk-delete')) {
                        $deleteForm = '
            <form action="' . route('produks.destroy', $row->id) . '" method="POST" style="display:inline-block;" onsubmit="return confirm(\'Yakin ingin menghapus data ini?\')">
                ' . csrf_field() . method_field('DELETE') . '
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>';
                        $buttons[] = $deleteForm;
                    }

                    return implode(' ', $buttons);
                })
                ->addColumn('id_kategori', function ($row) {
                    return $row->kategori->nama_kategori;
                })
                ->addColumn('foto', function ($row) {
                    if ($row->foto) {
                        return '<img src="' . asset($row->foto) . '" width="100" alt="Foto Pembeli">';
                    } else {
                        return '-';
                    }
                })
                ->rawColumns(['action', 'foto'])
                ->make(true);
        }

        return view('produks.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('produks.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validated = $request->validate([
            'id_kategori' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'diskon' => 'required',
            'foto' => 'required|image|mimes:png,jpeg,jpg|max:2048',
        ]);
        // dd($request->all());

        // Menyimpan file foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/produk', $filename);
            $validated['foto'] = 'storage/produk/' . $filename;
            $input['foto'] = $filename;
        }

        // Simpan data pembeli
        $validated['created_by'] = 1; // Ganti sesuai user login jika pakai auth

        Produk::create($validated);

        return redirect()->route('produks.index')
            ->with('success', 'Produk created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //

        return view('produks.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        $kategoris = Kategori::all();
        return view('produks.edit', compact('produk', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        //

        $request->validate([
            'id_kategori' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'diskon' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $data = $request->except('foto');
        $data['created_by'] = 1; // ganti sesuai user login jika pakai auth

        // Handle file upload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($produk->foto && Storage::exists(str_replace('storage/', 'public/', $produk->foto))) {
                Storage::delete(str_replace('storage/', 'public/', $produk->foto));
            }

            // Simpan foto baru
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/produk', $filename);
            $data['foto'] = 'storage/produk/' . $filename;
        }

        // Update data
        $produk->update($data);
        return redirect()->route('produks.index')
            ->with('success', 'Produk updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        // Hapus file foto jika ada
        if ($produk->foto && Storage::exists(str_replace('storage/', 'public/', $produk->foto))) {
            Storage::delete(str_replace('storage/', 'public/', $produk->foto));
        }

        // Hapus data dari database
        $produk->delete();

        return redirect()->route('produks.index')
            ->with('success', 'Produk berhasil dihapus beserta fotonya.');
    }
}
