@extends('layouts.layouts')

@section('content')
    <div class="row p-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Kategoris</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('kategoris.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <div class="card p-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Kategori:</strong>
                        {{ $kategori->nama_kategori }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Keterangan:</strong>
                        {{ $kategori->keterangan }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
