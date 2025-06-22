@extends('layouts.layouts')

@section('content')
    <div class="row p-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Pembelis</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pembelis.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <div class="card p-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama:</strong>
                        {{ $pembeli->nama }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Alamat:</strong>
                        {{ $pembeli->alamat }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $pembeli->email }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>No Hp:</strong>
                        {{ $pembeli->nohp }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Foto:</strong>
                        <img src="{{ asset($pembeli->foto) }}" alt="pembeli foto" width="100">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gender:</strong>
                        {{ $pembeli->gender }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tanggal Gabung:</strong>
                        {{ $pembeli->tanggal_gabung }}
                    </div>
                </div>
            </div>
        @endsection
