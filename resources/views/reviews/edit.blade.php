@extends('layouts.layouts')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Reviews</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('reviews.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card p-5">
        <form action="{{ route('reviews.update', $review->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Produk:</strong>
                        <select class="form-select" aria-label="Default select example" name="id_produk">
                            <option selected value="">Pilih Produk</option>
                            @foreach ($produks as $produk)
                                <option value="{{ $produk->id }}"
                                    {{ $produk->id == $review->id_produk ? 'selected' : '' }}>
                                    {{ $produk->nama_produk }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Pembeli:</strong>
                        <select class="form-select" aria-label="Default select example" name="id_pembeli">
                            <option selected value="">Pilih Pembeli</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ $user->id == $review->id_pembeli ? 'selected' : '' }}>
                                    {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Komentar:</strong>
                        <textarea class="form-control" style="height:150px" name="komentar" placeholder="Komentar">{{ $review->komentar }}</textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    @endsection
