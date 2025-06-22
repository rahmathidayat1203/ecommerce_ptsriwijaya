@extends('layouts.layouts')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Payments</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('payments.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your
            input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card p-5">
        <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Order:</strong>
                        <select class="form-select" aria-label="Default select example" name="id_order">
                            <option selected value="">Pilih Order</option>
                            @foreach ($orders as $order)
                                <option value="{{ $order->id }}">{{ $order->pembeli->name }} /
                                    {{ $order->total_pembelian }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Metode Pembayaran:</strong>
                        <textarea class="form-control" style="height:150px" name="metode_pembayaran" placeholder="Metode Pembayaran"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Metode Status:</strong>
                        <textarea class="form-control" style="height:150px" name="status" placeholder="Metode Status"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jumlah Pembayaran:</strong>
                        <textarea class="form-control" style="height:150px" name="jumlah_pembayaran" placeholder="Jumlah Pembayaran"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Bukti Pembayaran:</strong>
                        <input type="file" name="bukti_pembayaran" class="form-control" placeholder="Bukti Pembayaran">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn primary">Submit</button>
                </div>
            </div>

        </form>
    @endsection
