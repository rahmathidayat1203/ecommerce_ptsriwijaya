<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     // 

    //     $kategoris = Kategori::latest()->paginate(5);
    //     return view('kategoris.index', compact('kategoris'))
    //         ->with('i', (request()->input('page', 1) - 1) * 5);
    // }

    public function __construct()
    {
        $this->middleware('permission:kategori-list|kategori-create|kategori-edit|kategori-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:kategori-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:kategori-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:kategori-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Kategori::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '';

                    $btn .= '<a href="' . route('kategoris.show', $row->id) . '" class="btn btn-info btn-sm">Show</a> ';
                    if (Auth::user()->can('kategoris-show')) {
                    }

                    $btn .= '<a href="' . route('kategoris.edit', $row->id) . '" class="btn btn-warning btn-sm">Edit</a> ';
                    if (Auth::user()->can('kategoris-edit')) {
                    }

                    $btn .= '<form action="' . route('kategoris.destroy', $row->id) . '" method="POST" style="display:inline-block;" onsubmit="return confirm(\'Yakin ingin menghapus data ini?\')">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm">Delete</button> </form>';
                    if (Auth::user()->can('kategoris-delete')) {
                    }

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('kategoris.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 

        return view('kategoris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'required',
        ]);
        $input = $request->all();
        $input['created_by'] = 1;
        Kategori::create($input);

        return redirect()->route('kategoris.index')
            ->with('success', 'Kategori created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
        return view('kategoris.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //

        return view('kategoris.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        //

        $request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'required',
        ]);
        $input = $request->all();
        $input['created_by'] = 1;
        Kategori::create($input);

        $kategori->update($request->all());

        return redirect()->route('kategoris.index')
            ->with('success', 'Kategori updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        //

        $kategori->delete();

        return redirect()->route('kategoris.index')
            ->with('success', 'Kategori deleted successfully');
    }
}
