@extends('layouts.layouts')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Pengirimans</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pengirimans.index') }}"> Back</a>
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
        <form action="{{ route('pengirimans.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Id Order:</strong>
                        <input type="text" name="id_order" class="form-control" placeholder="Id Order">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Alamat Pengiriman:</strong>
                        <textarea class="form-control" style="height:150px" name="alamat_pengiriman" placeholder="Alamat Pengiriman"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Metode Pengiriman:</strong>
                        <textarea class="form-control" style="height:150px" name="metode_pengiriman" placeholder="Metode Pengiriman"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Status Pengiriman:</strong>
                        <textarea class="form-control" style="height:150px" name="status_pengiriman" placeholder="Status Pengiriman"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nomor Perjalanan:</strong>
                        <textarea class="form-control" style="height:150px" name="nomor_perjalanan" placeholder="Nomor Perjalanan"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn primary">Submit</button>
                </div>
            </div>
        </form>
    @endsection
