@extends('layouts.layouts')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Pembelis</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pendaftaranhajis.index') }}"> Back</a>
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
        <form action="{{ route('pendaftaranhajis.update', $pendaftaranhaji->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nomor KTP:</strong>
                        <input type="text" name="nomor_ktp" value="{{ $pendaftaranhaji->nomor_ktp }}" class="form-control"
                            placeholder="No Ktp">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Lengkap:</strong>
                        <input type="text" name="nama_lengkap" value="{{ $pendaftaranhaji->nama_lengkap }}" class="form-control"
                            placeholder="Nama Lengkap">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Ayah:</strong>
                        <input type="text" name="nama_ayah" value="{{ $pendaftaranhaji->nama_ayah }}" class="form-control"
                            placeholder="Nama Ayah">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tempat Lahir:</strong>
                        <input type="text" name="tempat_lahir" value="{{ $pendaftaranhaji->tempat_lahir }}" class="form-control"
                            placeholder="No Hp">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tanggal Lahir:</strong>
                        <input type="text" name="tanggal_lahir" value="{{ $pendaftaranhaji->tanggal_lahir }}" class="form-control"
                            placeholder="Foto">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jenis Kelamin:</strong>
                        <input type="text" name="jenis_kelamin" value="{{ $pendaftaranhaji->jenis_kelamin }}" class="form-control"
                            placeholder="Jenis Kelamin">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kewarganegaraan:</strong>
                        <input type="text" name="kewarganegaraan" value="{{ $pendaftaranhaji->kewarganegaraan }}"
                            class="form-control" placeholder="Kewarganegaraan">
                    </div>
                </div>
                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Alamat Lengkap:</strong>
                        <input type="text" name="alamat_lengkap" value="{{ $pendaftaranhaji->alamat_lengkap }}"
                            class="form-control" placeholder="Alamat Lengkap">
                    </div>
                </div>
                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Desa/Kelurahan:</strong>
                        <input type="text" name="desa_kelurahan" value="{{ $pendaftaranhaji->desa_kelurahan }}"
                            class="form-control" placeholder="Desa/Kelurahan">
                    </div>
                </div>
                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kecamatan:</strong>
                        <input type="text" name="kecamatan" value="{{ $pendaftaranhaji->kecamatan }}"
                            class="form-control" placeholder="Kecamatan">
                    </div>
                </div>
                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>kabupaten_kota:</strong>
                        <input type="text" name="kabupaten_kota" value="{{ $pendaftaranhaji->kabupaten_kota }}"
                            class="form-control" placeholder="kabupaten_kota">
                    </div>
                </div>
                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kewarganegaraan:</strong>
                        <input type="text" name="kewarganegaraan" value="{{ $pendaftaranhaji->kewarganegaraan }}"
                            class="form-control" placeholder="Kewarganegaraan">
                    </div>
                </div>
                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kewarganegaraan:</strong>
                        <input type="text" name="kewarganegaraan" value="{{ $pendaftaranhaji->kewarganegaraan }}"
                            class="form-control" placeholder="Kewarganegaraan">
                    </div>
                </div>
                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kewarganegaraan:</strong>
                        <input type="text" name="kewarganegaraan" value="{{ $pendaftaranhaji->kewarganegaraan }}"
                            class="form-control" placeholder="Kewarganegaraan">
                    </div>
                </div>
                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kewarganegaraan:</strong>
                        <input type="text" name="kewarganegaraan" value="{{ $pendaftaranhaji->kewarganegaraan }}"
                            class="form-control" placeholder="Kewarganegaraan">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    @endsection
