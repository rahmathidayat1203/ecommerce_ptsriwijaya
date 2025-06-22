<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     // 

    //     $kategoris = Order::latest()->paginate(5);
    //     return view('orders.index', compact('orders'))
    //         ->with('i', (request()->input('page', 1) - 1) * 5);
    // }
    public function __construct()
    {
        $this->middleware('permission:order-list|order-create|order-edit|order-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:order-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:order-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:order-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = order::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '';

                    $btn .= '<a href="' . route('orders.show', $row->id) . '" class="btn btn-info btn-sm">Show</a> ';
                    if (Auth::user()->can('orders-show')) {
                    }

                    $btn .= '<a href="' . route('orders.edit', $row->id) . '" class="btn btn-warning btn-sm">Edit</a> ';
                    if (Auth::user()->can('orders-edit')) {
                    }

                    $btn .= '<form action="' . route('orders.destroy', $row->id) . '" method="POST" style="display:inline-block;" onsubmit="return confirm(\'Yakin ingin menghapus data ini?\')">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
                    if (Auth::user()->can('orders-delete')) {
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

        return view('orders.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $produks = Produk::all();
        return view('orders.create', compact('users', 'produks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'id_pembeli' => 'required',
            'id_produk' => 'required',
            'total_pembelian' => 'required',
            'status' => 'required',
            'tanggal_pembelian' => 'required',
        ]);
        $input = $request->all();
        $input['created_by'] = 1;
        Order::create($input);

        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $users = User::all();
        $produks = Produk::all();
        return view('orders.edit', compact('order', 'users', 'produks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //

        $request->validate([
            'id_pembeli' => 'required',
            'id_produk' => 'required',
            'total_pembelian' => 'required',
            'status' => 'required',
            'tanggal_pembelian' => 'required',
            'bukti_pembayaran' => 'required',
        ]);
        $input = $request->all();
        $input['created_by'] = 1;
        Order::create($input);

        $order->update($request->all());

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //


        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully');
    }

    public function order_list()
    {
        $id_pembeli = auth()->user()->id;

        // Ambil semua order beserta produk terkait
        $orders = Order::with('produk')
            ->where('id_pembeli', $id_pembeli)
            ->get();
        // dd($orders);

        // Hitung harga setelah diskon untuk setiap order dan simpan di properti tambahan
        foreach ($orders as $order) {
            $produk = $order->produk;
            if ($produk) {
                $harga = intval($produk->harga);
                $diskon = intval($produk->diskon);
                $hargaSetelahDiskon = $harga - ($harga * $diskon / 100);
                // Simpan hasil perhitungan ke properti dinamis order
                $order->harga_setelah_diskon = $hargaSetelahDiskon;
            } else {
                $order->harga_setelah_diskon = 0;
            }
        }

        return view('order_list.order_list', compact('orders'));
    }

    public function checkout(Request $request)
    {
        $selectedOrderIds = $request->input('selected_orders', []);

        if (empty($selectedOrderIds)) {
            return back()->with('error', 'Silakan pilih minimal satu order.');
        }

        // Ambil semua order yang dipilih
        $orders = Order::whereIn('id', $selectedOrderIds)->with('produk')->get();

        // Hitung total harga setelah diskon
        $totalHargaSetelahDiskon = 0;
        foreach ($orders as $order) {
            $harga = $order->produk->harga;
            $diskon = $order->produk->diskon ?? 0;
            $hargaSetelahDiskon = intval($harga) - (intval($harga) * intval($diskon) / 100);
            $order->harga_setelah_diskon = $hargaSetelahDiskon;
            $totalHargaSetelahDiskon += $hargaSetelahDiskon;
        }

        // Kirim data ke view checkout
        return view('checkout', [
            'orders' => $orders,
            'totalHargaSetelahDiskon' => $totalHargaSetelahDiskon
        ]);
    }

    public function pay(Request $request)
    {
        $orderIds = $request->order_ids;

        // Ambil semua order dan relasi produk
        $orders = Order::with('produk')->whereIn('id', $orderIds)->get();

        // Hitung total harga setelah diskon
        $totalHarga = $orders->sum(function ($order) {
            $produk = $order->produk;
            if (!$produk) return 0;

            $harga = intval($produk->harga);
            $diskon = intval($produk->diskon);
            $hargaSetelahDiskon = $harga - ($harga * $diskon / 100);

            return $hargaSetelahDiskon * $order->total_pembelian;
        });

        return view('pembayaran', [
            'orders' => $orders,
            'total' => $totalHarga,
            'orderIds' => $orderIds
        ]);
    }



    public function redirectToPayment(Request $request)
    {
        // dd($request->all());
        $orderIds = $request->input('order_ids');
        $total = $request->input('total');

        return view('pembayaran', [
            'orderIds' => $orderIds,
            'total' => $total
        ]);
    }
}
