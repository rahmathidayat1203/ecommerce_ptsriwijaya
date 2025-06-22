<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     // 

    //     $kategoris = Pengiriman::latest()->paginate(5);
    //     return view('pengirimans.index', compact('pengirimans'))
    //         ->with('i', (request()->input('page', 1) - 1) * 5);
    // }
    public function __construct()
    {
        $this->middleware('permission:pengiriman-list|pengiriman-create|pengiriman-edit|pengiriman-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:pengiriman-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:pengiriman-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:pengiriman-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pengiriman::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '';

                    if (Auth::user()->can('pengirimans.show')) {
                        $btn .= '<a href="' . route('pengirimans.show', $row->id) . '" class="btn btn-info btn-sm">Show</a> ';
                    }

                    if (Auth::user()->can('pengirimans.edit')) {
                        $btn .= '<a href="' . route('pengirimans.edit', $row->id) . '" class="btn btn-warning btn-sm">Edit</a> ';
                    }

                    if (Auth::user()->can('pengirimans.delete')) {
                        $btn .= '
                <form action="' . route('pengirimans.destroy', $row->id) . '" method="POST" style="display:inline-block;" onsubmit="return confirm(\'Yakin ingin menghapus data ini?\')">
                    ' . csrf_field() . method_field('DELETE') . '
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            ';
                    }

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pengirimans.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('pengirimans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'id_order' => 'required',
            'alamat_pengiriman' => 'required',
            'metode_pengiriman' => 'required',
            'status_pengiriman' => 'required',
            'nomor_perjalanan' => 'required',
        ]);
        $input = $request->all();
        $input['created_by'] = 1;
        Pengiriman::create($input);

        return redirect()->route('pengirimans.index')
            ->with('success', 'Pengiriman created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengiriman $pengiriman)
    {
        //

        return view('pengirimans.show', compact('pengiriman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengiriman $pengiriman)
    {
        //

        return view('pengirimans.edit', compact('pengiriman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengiriman $pengiriman)
    {
        //

        $request->validate([
            'id_order' => 'required',
            'alamat_pengiriman' => 'required',
            'metode_pengiriman' => 'required',
            'status_pengiriman' => 'required',
            'nomor_perjalanan' => 'required',
        ]);
        $input = $request->all();
        $input['created_by'] = 1;
        Pengiriman::create($input);

        $pengiriman->update($request->all());

        return redirect()->route('pengirimans.index')
            ->with('success', 'Pengiriman updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengiriman $pengiriman)
    {
        //

        $pengiriman->delete();

        return redirect()->route('pengirimans.index')
            ->with('success', 'Pengiriman deleted successfully');
    }
}
