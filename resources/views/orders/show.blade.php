@extends('layouts.layouts')

@section('content')
    <div class="row p-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Orders</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <div class="card p-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Id Pembeli:</strong>
                        {{ $order->id_pembeli }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Id Produk:</strong>
                        {{ $order->id_produk }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Total Pembelian:</strong>
                        {{ $order->total_pembelian }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Status:</strong>
                        {{ $order->status }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tanggal Pembelian:</strong>
                        {{ $order->tanggal_pembelian }}
                    </div>
                </div>
            </div>
        @endsection
