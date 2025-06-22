@extends('layouts.layouts')

@section('content')
    <div class="row p-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Produks</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('produks.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <div class="card p-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Id Kategori:</strong>
                        {{ $produk->id_kategori }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Produk:</strong>
                        {{ $produk->nama_produk }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Harga:</strong>
                        {{ $produk->harga }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Diskon:</strong>
                        {{ $produk->diskon }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Deskripsi:</strong>
                        {{ $produk->deskripsi }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Stock:</strong>
                        {{ $produk->stock }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Foto:</strong>
                        <img src="{{ asset($produk->foto) }}" alt="pembeli foto" width="100">
                    </div>
                </div>
            </div>
        @endsection
