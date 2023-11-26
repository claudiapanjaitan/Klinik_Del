@extends('layouts.main')
@section('content')
    <h1 class="h3 mb-2 text-gray-800 text-center">Form Konsultasi</h1>
    <div class="container">
        <div class="row mt-4">
                <div class="col-10">
                    <form action="{{ route('konsultasi.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Keluhan</label>
                            <input type="text" name="keluhan" id="" class="form-control @error('keluhan') is-invalid @enderror" placeholder="Masukkan Keluhan Anda" autofocus value="{{ old('keluhan') }}">
                            @error('keluhan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_konsultasi">Tanggal Konsultasi</label>
                            <div class="input-group">
                                <input type="date" name="tanggal_konsultasi" id="tanggal_konsultasi" class="form-control @error('tanggal_konsultasi') is-invalid @enderror">
                                @error('tanggal_konsultasi')
                                <div class="invalid-feedback input-group">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Waktu Konsultasi</label>
                            <input type="time" name="waktu_konsultasi" id="waktu_konsultasi" class="form-control @error('waktu_konsultasi') is-invalid @enderror" >
                            <span class="text-danger error-text waktu_konsultasi_error"></span>
                            @error('waktu_konsultasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-primary mt-2" value="Tambah">
                            <a href="{{ route('konsultasi.index') }}" type="submit" class="btn btn-primary mt-2">Batal</a>
                        </div>
                    </form>
                </div>
        </div>
    </div>
@endsection