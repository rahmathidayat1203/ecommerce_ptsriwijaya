@extends('layouts.layouts')

@section('content')
    <div class="row p-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Pengirimans</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pengirimans.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <div class="card p-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Id Order:</strong>
                        {{ $pengiriman->id_order }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Alamat Pengiriman:</strong>
                        {{ $pengiriman->alamat_pengiriman }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Metode Pengiriman:</strong>
                        {{ $pengiriman->metode_pengiriman }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Status Pengiriman:</strong>
                        {{ $pengiriman->status_pengiriman }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nomor Perjalanan:</strong>
                        {{ $pengiriman->nomor_perjalanan }}
                    </div>
                </div>
            </div>
        @endsection
