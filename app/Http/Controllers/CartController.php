<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Produk;

class CartController extends Controller
{
    /**
     * Tampilkan halaman keranjang.
     */

    public function index()
    {
        return view('index');
    }

    /**
     * Simpan produk ke dalam keranjang.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'product_id' => 'required',
            'quantity'   => 'required|integer|min:1',
        ]);


        $product = Produk::findOrFail($request->product_id);
        // dd($product);
        $input = $request->all();
        $input['id_pembeli'] = auth()->user()->id;
        $input['id_produk'] = $request->product_id;
        $input['total_pembelian'] = $request->quantity;
        $input['status'] = "pending";
        $input['tanggal_pembelian'] = now();
        $input['created_by'] = 1;
        $create = Order::create($input);
        // dd($create);
        // if (isset($cart[$product->id])) {
        //     $cart[$product->id]['quantity'] += $request->quantity;
        // } else {
        //     $cart[$product->id] = [
        //         'name'     => $product->nama_produk,
        //         'price'    => $product->harga,
        //         'quantity' => $request->quantity,
        //         'foto'     => $product->foto,
        //     ];
        // }

        // session()->put('cart', $cart);

        return redirect()->route('order.list');
    }

    /**
     * Hapus produk dari keranjang.
     */
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

    /**
     * Kosongkan seluruh keranjang (opsional).
     */
    public function clear()
    {
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Keranjang telah dikosongkan.');
    }
}
