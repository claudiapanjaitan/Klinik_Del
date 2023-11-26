@extends('layouts.main')
@section('content')
<h1 class="h3 mb-2 text-gray-800 text-center">Edit Konsultasi</h1>
<div class="container">
    <div class="row mt-4">
            <div class="col-10">
                <form action="{{ route('konsultasi.update',$data->id) }}" method="post">
                    @method("PATCH")
                    @csrf
                    <div class="form-group">
                        <label>Keluhan</label>
                        <textarea type="text" name="keluhan" id="keluhan" class="form-control @error('keluhan') is-invalid @enderror" placeholder="Masukkan Keluhan Anda">{{ $data->keluhan }}</textarea>
                        @error('keluhan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tanggal Konsultasi</label>
                        <input type="date" name="tanggal_konsultasi" id="tanggal_konsultasi" class="form-control @error('tanggal_konsultasi') is-invalid @enderror" value="{{ $data->tanggal_konsultasi }}"required>
                        @error('tanggal_konsultasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Waktu Konsultasi</label>
                        <input type="time" name="waktu_konsultasi" id="waktu_konsultasi" class="form-control @error('waktu_konsultasi') is-invalid @enderror" value="{{ $data->waktu_konsultasi }}"required>
                        @error('waktu_konsultasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary mt-2" value="Update">
                        <a href="{{ route('konsultasi.index') }}" type="submit" class="btn btn-primary mt-2">Batal</a>
                    </div>
                </form>
            </div>
    </div>
</div>
@endsection