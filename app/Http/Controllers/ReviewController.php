<?php

namespace App\Http\Controllers;

use App\Models\review;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     // 

    //     $kategoris = Payment::latest()->paginate(5);
    //     return view('payments.index', compact('orders'))
    //         ->with('i', (request()->input('page', 1) - 1) * 5);
    // }
    public function __construct()
    {
        $this->middleware('permission:review-list|review-create|review-edit|review-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:review-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:review-edit', ['only' => ['edit', 'update']]);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Review::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '';

                    $btn .= '<a href="' . route('reviews.show', $row->id) . '" class="btn btn-info btn-sm">Show</a> ';
                    if (Auth::user()->can('reviews-show')) {
                    }



                    return $btn;
                })
                ->addColumn('id_pembeli', function ($row) {
                    return $row->pembeli->name;
                })
                ->addColumn('id_produk', function ($row) {
                    return $row->produk->nama_produk ?? '-';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('reviews.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $users = User::all();
        $produks = Produk::all();
        return view('reviews.create', compact('users', 'produks'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        // dd($request->all());

        $request->validate([
            'id_produk' => 'sometimes',
            'id_pembeli' => 'sometimes',
            'komentar' => 'required',

        ]);
        $input = $request->all();
        $input['created_by'] = 1;
        Review::create($input);

        return redirect()->route('reviews.index')
            ->with('success', 'Review created successfully.');
        $request->validate([
            'komentar' => 'required|string|max:1000',
        ]);

        Review::create([
            'komentar' => $request->komentar,
            'created_at' => now(),
            // Tambahkan field lain sesuai kebutuhan (misal user_id jika login)
        ]);

        return redirect()->back()->with('success', 'Ulasan berhasil ditambahkan!');
    }

    public function review_simpan(Request $request)
    {
        //

        // dd($request->all());

        $request->validate([
            'id_produk' => 'sometimes',
            'id_pembeli' => 'sometimes',
            'komentar' => 'required',

        ]);
        $input = $request->all();
        $input['created_by'] = 1;
        Review::create($input);

        return redirect()->back()->with('success', 'Ulasan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(review $review)
    {
        //

        return view('reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(review $review)
    {
        $users = User::all();
        $produks = Produk::all();

        return view('reviews.edit', compact('review', 'users', 'produks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $reviews)
    {
        //

        $request->validate([
            'id_produk' => 'required',
            'id_pembeli' => 'required',
            'komentar' => 'required',

        ]);
        $input = $request->all();
        $input['created_by'] = 1;
        Review::create($input);

        $reviews->update($request->all());

        return redirect()->route('reviews.index')
            ->with('success', 'Review updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $reviews)
    {
        //


        $reviews->delete();

        return redirect()->route('reviews.index')
            ->with('success', 'Review deleted successfully');
    }

    public function filter_review()
    {
        try {
            $reviews = Review::all();

            if ($reviews->isEmpty()) {
                return response()->json([
                    'status' => true,
                    'data' => [],
                    'message' => 'Tidak ada review tersedia.'
                ], 200);
            }

            $filtered = [];

            foreach ($reviews as $review) {
                try {
                    $response = Http::withOptions([
                        'verify' => false // abaikan SSL verification
                    ])->asJson()->post('https://127.0.0.1:5000/predict', [
                        'komentar' => $review->komentar
                    ]);

                    if (!$response->successful()) {
                        Log::error("Gagal akses Flask API untuk komentar ID {$review->id}. Status: " . $response->status() . " - " . $response->body());
                        continue;
                    }

                    $result = $response->json();

                    if (isset($result['prediksi_sentimen']) && $result['prediksi_sentimen'] === 'POSITIF') {
                        $filtered[] = [
                            'id' => $review->id,
                            'komentar' => $review->komentar,
                            'komentar_clean' => $result['komentar_clean'] ?? '',
                            'created_at' => $review->created_at,
                        ];
                    }
                } catch (\Exception $e) {
                    Log::error("Error saat memproses review ID {$review->id}: " . $e->getMessage());
                }
            }

            return response()->json([
                'status' => true,
                'jumlah_positif' => count($filtered),
                'total_review' => $reviews->count(),
                'data' => $filtered
            ], 200);
        } catch (\Exception $e) {
            Log::error("Terjadi kesalahan saat filter_review: " . $e->getMessage());
            return response()->json([
                'error' => 'Terjadi kesalahan saat memfilter review',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
