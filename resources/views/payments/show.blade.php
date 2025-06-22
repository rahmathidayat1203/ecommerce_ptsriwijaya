@extends('layouts.layouts')

@section('content')
    <div class="row p-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Payments</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('payments.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <div class="card p-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Id Order:</strong>
                        {{ $payment->id_order }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Metode Pembayaran:</strong>
                        {{ $payment->metode_pembayaran }}
                    </div>
                </div>
                div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Metode Status:</strong>
                    {{ $payment->metode_status }}
                </div>
            </div>
            div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jumlah Pembayaran:</strong>
                {{ $payment->jumlah_pembayaran }}
            </div>
        </div>
    </div>
@endsection
