@extends('layouts.main')
@section('content')
<h1 class="h3 mb-2 text-gray-800 text-center">Edit Jadwal</h1>
<div class="container">
    <div class="row mt-4">
            <div class="col-10">
                <form action="{{ route('jadwal.update',$data->id) }}" method="post">
                    @method("PATCH")
                    @csrf
                    <div class="form-group">
                        <label>Nama Petugas</label>
                        <input type="text" name="petugas" id="" class="form-control @error('petugas') is-invalid @enderror" placeholder="Masukkan Nama Petugas" autofocus value="{{ $data->petugas }}">
                        @error('petugas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text" name="NIP" id="" class="form-control @error('NIP') is-invalid @enderror" placeholder="Masukkan NIP Anda" value="{{ $data->NIP }}">
                        @error('NIP')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Hari</label>
                        <input type="text" name="hari" id="" class="form-control @error('hari') is-invalid @enderror" placeholder="Masukkan Hari" value="{{ old('hari', $data->hari) }}">
                        @error('hari')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Waktu Tugas</label>
                        <input type="time" name="waktu" id="" class="form-control @error('waktu') is-invalid @enderror" value="{{ old('waktu', $data->waktu) }}">
                        @error('waktu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Selesai Tugas</label>
                        <input type="time" name="waktu2" id="" class="form-control @error('waktu2') is-invalid @enderror" value="{{ old('waktu2', $data->waktu2) }}">
                        @error('waktu2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary mt-3" value="Update">
                        <a href="{{ route('jadwal.index') }}" type="submit" class="btn btn-primary mt-3">Batal</a>
                    </div>
                </form>
            </div>
    </div>
</div>
@endsection