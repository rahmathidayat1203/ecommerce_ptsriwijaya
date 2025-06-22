<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;


class PaymentController extends Controller
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

    // public function __construct()
    // {
    //     $this->middleware('permission:payment-list|payment-create|payment-edit|payment-delete', ['only' => ['index', 'show']]);
    //     $this->middleware('permission:payment-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:payment-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:payment-delete', ['only' => ['destroy']]);
    // }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Payment::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '';

                    // Tombol Show
                    if (Auth::user()->can('payment-show')) {
                        $btn .= '<a href="' . route('payments.show', $row->id) . '" class="btn btn-info btn-sm">Show</a> ';
                    }

                    // Tombol Edit
                    if (Auth::user()->can('payment-edit')) {
                        $btn .= '<a href="' . route('payments.edit', $row->id) . '" class="btn btn-warning btn-sm">Edit</a> ';
                    }

                    // Tombol Approve
                    if (Auth::user()->can('payment-approve')) {
                        $btn .= '<form action="' . route('payments.approve', $row->id) . '" method="POST" style="display:inline-block; margin-right: 5px;">'
                            . csrf_field()
                            . '<button type="submit" class="btn btn-success btn-sm" onclick="return confirm(\'Yakin ingin menyetujui pembayaran ini?\')">Approve</button>'
                            . '</form>';
                    }

                    // Tombol Delete
                    if (Auth::user()->can('payment-delete')) {
                        $btn .= '<form action="' . route('payments.destroy', $row->id) . '" method="POST" style="display:inline-block;" onsubmit="return confirm(\'Yakin ingin menghapus data ini?\')">'
                            . csrf_field() . method_field('DELETE')
                            . '<button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
                    }

                    return $btn;
                })
                ->addColumn('id_order', function ($row) {
                    return $row->order->pembeli->name;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('payments.index');
    }

    /**
     * Show the form for creating a new resource.
     */

    public function payment_approve($id)
    {
        try {
            $payment = Payment::where('id', '=', $id)->update([
                'status' => 'success'
            ]);
            return redirect()->back()->with('success', 'approve sukses');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'approve failed');
        }
    }
    public function payement_store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_order' => 'required|integer',
            'jumlah_pembayaran' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // maksimal 2MB
        ]);

        // Proses upload file
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = 'bukti_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/bukti_pembayaran', $filename); // disimpan di storage/app/public/bukti_pembayaran
        } else {
            $filename = null;
        }
        $created_by = 0;
        if (Auth::check()) {
            $created_by = Auth::user()->id;
        } else {
            $created_by = 1;
        }

        // Simpan ke database
        Payment::create([
            'id_order' => $request->id_order,
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status' => "pending",
            'bukti_pembayaran' => $filename, // pastikan kolom ini ada di tabel payments
            'created_by' => $created_by
        ]);

        return redirect()->intended("/landing");
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     // dd($request->all());
    //     $request->validate([
    //         'id_order' => 'required',
    //         'metode_pembayaran' => 'required',
    //         'metode_status' => 'required',
    //         'jumlah_pembayaran' => 'required',
    //     ]);

    //     $input = $request->all();
    //     $input['created_by'] = 1; // bisa diganti dengan Auth::id() jika pakai login

    //     Payment::create($input);

    //     return redirect()->route('payments.index')
    //         ->with('success', 'Payment created successfully.');
    // }


    public function store(Request $request)
    {
        // dd($request->all());
        // Validasi input termasuk file
        $validatedData = $request->validate([
            'id_order'           => 'required|exists:orders,id',
            'metode_pembayaran' => 'required|string|max:50',
            'metode_status'     => 'required|string|max:50',
            'jumlah_pembayaran' => 'required|numeric|min:0',
            'bukti_pembayaran'  => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // max 2MB
        ]);

        // Tambahkan ID pembuat
        $validatedData['created_by'] = auth()->id() ?? 1;

        // Proses upload file jika ada
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/bukti_pembayaran', $fileName, 'public');
            $validatedData['bukti_pembayaran'] = $filePath;
        }

        // Simpan ke database
        Payment::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('payments.index')
            ->with('success', 'Payment created successfully.');
    }


    public function pembayaran_view($id)
    {
        return view('pembayaran', compact('id'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //

        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        $orders = Order::all();
        return view('payments.edit', compact('payment', 'orders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //

        $request->validate([
            'id_order' => 'required',
            'metode_pembayaran' => 'required',
            'metode_status' => 'required',
            'jumlah_pembayaran' => 'required',
        ]);
        $input = $request->all();
        $input['created_by'] = 1;
        Payment::create($input);

        $payment->update($request->all());

        return redirect()->route('payments.index')
            ->with('success', 'Payment updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //

        $payment->delete();

        return redirect()->route('payments.index')
            ->with('success', 'Payment deleted successfully');
    }
}
